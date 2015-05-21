<?
session_cache_limiter(false);
session_start();



include_once "controller/cms.control.php";

$class = new control(); // instancia da classe de controle

// instanciações de libs
$app = $class->_SLIM();
$signIn = $class->_LOGIN();
$user = $class->_USER();
$action = $class->_ACTIONS();


$data = array('path' => $action->BPath(), 'file'=>$class->_FILE(),"user" => $user, 'url' => $action->urlPath(), "baseUrlAjax" => $action->baseUrlAjax(), 'cat' => $user->selectAllCategory());




// funções anonymas para as rotas:.

$authentication = function() use ($data){
    $app = \Slim\Slim::getInstance();

    //iniciaizando a session para false
    if(!isset($_SESSION["auth"]))
        $_SESSION['auth'] = false;

    if (isset( $_SESSION["auth"]) && $_SESSION['auth'] == false){
        $app->render("admin/login/index.php", $data);
        continue;
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
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*//
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*//



//*&% colocar qualquer outra uri importante antes deste cod abaixo pois ele ira emviar para as pastas em models.
// carregar paginas extras.. outras aparencias.



// router sub path - principal
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




//router sub path - principal
$app->get('/:page', $authentication, function ($page) use($app) {
    $app->render('404.html');
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/




//router sub path - principal
$app->get('/:page/:subpage/:file', $authentication,  function ($page, $subpage, $file) use($app, $data, $action) {
        try{
            $data['path'] = $action->BPath($page);
            $app->render($page.'/'.$subpage.'/'.$file.'.php', $data);
        }catch (\Exception $e){
            $app->render('404.html');
        }
})->conditions(array('page' => '[a-z]{2,}', 'subpage' => '[a-z]{2,}', 'file' => '[a-z]{2,}'));
/*---------------- end ------------------------*/




// diretorio inicial ou aparencia padrão

$app->get('/' , $authentication,function () use($app, $data) {
    try{
        $app->render('admin/index.php', $data);
    }catch (\Exception $e){
        $app->render('404.html');
    }
});
/*---------------- end ------------------------*/







//&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*
//*&*&*&*&*&*&*&*&   POST's  enviados por ajax  *&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&


// users ajax
$app->post('/user/create', function() use($user){
    echo $user->newUser($_POST);
});


$app->post('/user/edit', function() use ($user, $app){
    $array = $user->selectUser($_POST['id']);
    $array['id'] = $_POST['id'];
    $array['cat'] = $user->selectAllCategory();

    $app->render("admin/user/pages/edit.php", $array);
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