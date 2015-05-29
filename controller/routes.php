<?
/*
 * Definições basicas usadas em rotas:
 *  - pacote : area onde possue o admin ou site, é a raiz de uma parte importante do fluxo do sistema
 *  - pagina : tela index de modulo
 *  - modulo : conjunto de paginas fom funções especificas ou gerais para o funcionamento do sistema.
 *
 * */
session_cache_limiter(false);
session_start();

include_once "controller/cms.control.php";
$class = new control(); // instancia da classe de controle

// instanciações de libs
$app = $class->_SLIM();
$signIn = $class->_LOGIN();
$user = $class->_USER();
$action = $class->_ACTIONS();


// dados que é enviado comummente para todos as paginas renderizadas
$data = array('actions' => $action, 'file'=>$class->_FILE(), "user" => $user);

// funções anonymas para as rotas:.

$authentication = function(\Slim\Route $route) use ($data, $action){
    $app = \Slim\Slim::getInstance();

    if($action->filterRoutes($route->getParams()['page'])){
        //iniciaizando a session para false
        if(!isset($_SESSION["auth"]))
            $_SESSION['auth'] = false;

        if (isset( $_SESSION["auth"]) && $_SESSION['auth'] == false){
            $app->render("admin/login/index.php", $data);
            exit;
        }else if(!array_key_exists('subpage', $route->getParams())){
            $app->render("admin/index.php", $data);
            exit;
        }
    }
};

//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&//
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&//
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&//


//// mandados por post pelos formularios e enviado as informações p seus controllers.

// methodos que resolvem o login
$app->post('/login', function () use($signIn, $app, $data) {
    if(!empty($_POST['pass']))
        if($info = $signIn->singIn($_POST)){
            $_SESSION["user"] = $info; // guardando dados do usuario
            $_SESSION["auth"] = true;
            $app->render('admin/index.php', $data);
        }else{
            $data['notAceppt'] = true;
            $app->render('admin/login/index.php', $data);
        }
});

$app->get('/logout', function () use($signIn, $app, $data) {
    unset($_SESSION["user"]);
    unset($_SESSION["auth"]);
    $app->render('admin/login/index.php', $data);

});

/*---------------- end ------------------------*/



//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*//
//*&*&*&*&*&*&*&*&*&*  quatro bases de rotas principais dentro do fluxo   *&*&*&*&*&*&*&*&*&*&*&*&**&*&*&&*//
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*//


// rota inicial - direcionada para o site (preferencialmente);
$app->get('/' , function () use($app, $data) {
    try{
        $app->render('site/home/index.php', $data);
    }catch (\Exception $e){
        $app->render('404.html');
    }
});
/*---------------- end ------------------------*/


// segunda nivel de rota - ideal para navegar entre paginas ( rota voltada para o site )
$app->get('/:page', $authentication, function ($page) use($app, $data) {
    try{
        $app->render('site/'.$page.'/index.php', $data);
    }catch(\Exception $e){
        $app->render('404.html');
    }
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/



// rota entre pacotes (site, admin... por exemplo) - recebe pacote e pagina.
$app->get('/:page/:subpage', $authentication, function ($page, $subpage) use($app, $data, $action) {
    $caminho = $page.'/'.$subpage;
    try{
         //if ($action->checkAcess($caminho))
        if(true)
         {
             $data['path'] = $action->BPath($page);
             $app->render($caminho . '/index.php', $data);
         }else{
             $app->render('404.html');
         }
    }catch (\Exception $e){
       $app->render('404.html');
    }
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/




// rota que leva a subModulos de um determinado pacote.
$app->get('/:page/:subpage/:file',  function ($page, $subpage, $file) use($app, $data) {
        try{
            $app->render($page.'/'.$subpage.'/'.$file.'.php', $data);
        }catch (\Exception $e){
            $app->render('404.html');
        }
})->conditions(array('page' => '[a-z]{2,}', 'subpage' => '[a-z]{2,}', 'file' => '[a-z]{2,}'));
/*---------------- end ------------------------*/


//&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*
//*&*&*&*&*&*&*&*&   POST's  enviados por ajax  *&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&


$app->post('/user/create', function() use($user){
    echo $user->newUser($_POST);
});


$app->post('/user/edit', function() use ($user, $app){
    $array = $user->selectUser($_POST['id']);
    $array['id'] = $_POST['id'];
    $array['cat'] = $user->selectAllCategory();

    $app->render("admin/user/pages/edit.php", $array);
});

$app->post('/user/delete', function() use ($user, $app){
    $app->render("admin/user/pages/delete.php", ['id' => $_POST['id']]);
});

$app->post('/user/delete/:id', function($id) use ($user, $app){
    $user->deleteUser($id);
});

$app->post('/articles/newcategory', function() use ($user, $app){
    include "models/admin/articles/models/db.articles.php";
    $DBArticles = new DBArticles();
    echo $DBArticles->newCat($_POST['novacategoria']);
    //echo var_dump($_POST);
});

$app->post('/articles/new', function() use ($user, $app){
    $app->render('admin/articles/controllers/new.php');
});


//&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*
//*&*&*&*&*&*&*&*&   Serviços - requisisoes post  *&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&

// retiorna dados do usuario dado o id
$app->post('/user/:id', function($id) use($user){
    echo json_encode($user->selectUser($id), JSON_FORCE_OBJECT);
});



// --- fim

$app->run();