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

/// inicialização e configuração do slim
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array('templates.path' => 'modules')); // retorna a instancia
$app->config(array('debug'=>'true'));



//--------------------------------------
//teste
//\libs\autoUpdate::on();

//--------------------------------------


// instanciações de libs
$signIn = new \libs\login;
$user = new \libs\user;
$action = new \libs\functions;

// dados que é enviado comummente para todos as paginas renderizadas
$data = array('actions' => $action, 'file'=>new \libs\file, "user" => $user);



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
        }
    }
};

//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&//
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&//


// methodos que resolvem o login
$app->post('/login', function () use($signIn, $app, $data) {
    if(!empty($_POST['pass']))
        if($info = $signIn->singIn($_POST)){
            $_SESSION["user"] = $info[0]; // guardando dados do usuario
            $_SESSION["auth"] = true;
            $app->render('admin/dashboard/index.php', $data);
        }else{
            $data['notAceppt'] = true;
            $app->render('admin/login/index.php', $data);
        }
});

$app->get('/logout', function () use($signIn, $app, $data) {
    unset($_SESSION["user"]);
    unset($_SESSION["auth"]);
    session_destroy();
    $app->render('admin/login/index.php', $data);

});

/*---------------- end ------------------------*/


//                         ROTAS GENERICAS
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*//
//------------------  Quatro bases de rotas principais dentro do fluxo   ---------------------------------//
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*//

//%%%%%%%%//
//  base  //
//%%%%%%%//

// rota inicial - direcionada para o site (preferencialmente);
$app->get('/' , function () use($app, $data) {
    try{
        $app->render('admin/dashboard/index.php', $data);
    }catch (\Exception $e){
        $app->render('404.html');
    }
});
/*---------------- end ------------------------*/

  //%%%%//
 // 1  //
//%%%%//
// segunda nivel de rota - ideal para navegar entre paginas ( rota voltada para o site )
$app->get('/:page', $authentication, function ($page) use($app, $data, $action) {
    try{
        if($action->filterRoutes($page))
            $app->render($page.'/dashboard/index.php', $data);
        else
            $app->render('site/'.$page.'/index.php', $data);
    }catch(\Exception $e){
        $app->render('404.html');
    }
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/

//%%%%//
// 2  //
//%%%%//

// rota entre pacotes (site, admin... por exemplo) - recebe pacote e pagina.
$app->get('/:page/:subpage', $authentication, function ($page, $subpage) use($app, $data, $action) {
    try{
         //if ($action->checkAcess($caminho))
        if(true)
         {
             $data['path'] = $action->BPath($page);
             $app->render($page.'/'.$subpage . '/index.php', $data);
         }else{
             $app->render('404.html');
         }
    }catch (\Exception $e){
        $app->render('404.html');
    }
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/


//%%%%//
// 3  //
//%%%%//

// rota que leva a subModulos de um determinado pacote.
$app->get('/:page/:subpage/:file', $authentication, function ($page, $subpage, $file) use($app, $data) {
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


// users ajax -- user
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


$app->post('/user/edit/:id', function($id) use ($user, $app){
    $user->updateUser($_POST, $id);
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
