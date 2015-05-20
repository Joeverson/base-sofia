<?
if(empty($_SESSION['auth'])){
   $_SESSION['auth'] = false;
}

include_once "controller/cms.control.php";

$class = new control(); // instancia da classe de controle


// instanciações de libs
$app = $class->_SLIM();
$signIn = $class->_LOGIN();
$user = $class->_USER();
$auth = $_SESSION['auth'];
$action = $class->_ACTIONS();


$data = array('path' => $action->BPath(), 'file'=>$class->_FILE(),"user" => $user, 'url' => $action->urlPath(), "baseUrlAjax" => $action->baseUrlAjax(), 'cat' => $user->selectAllCategory());



// mandados por post pelos formularios e enviado as informações p seus controllers
//resolve o login
$app->post('/login', function () use($signIn, $app, $data) {
    if(!empty($_POST['pass']))
        if($info = $signIn->singIn($_POST['pass'])){
            $_SESSION["user"] = $info; // guardando dados do usuario
            $_SESSION["auth"] = true;
            $app->render('admin/index.php', $data);
        }else{
            $app->render('admin/login/index.php');
        }
});
/*---------------- end ------------------------*/






//*&% colocar qualquer outra uri importante antes deste cod abaixo pois ele ira emviar para as pastas em models.

// carregar paginas extras.. outras aparencias.

/*------------ router sub path - principal ------------------*/
$app->get('/:page/:subpage', function ($page, $subpage) use($app, $data, $action, $auth) {
    $caminho = $page.'/'.$subpage;
    if(true){
       try{
           if ($action->checkAcess($caminho))
           {
               $data['path'] = $action->BPath($page);
               $app->render($caminho . '/index.php', $data);
           }else{
               $app->render('404.html');
           }
      }catch (\Exception $e){
         $app->render('404.html');
      }
  }else{
      $app->render('admin/login/index.php');
  }
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/

/*------------ router sub path - principal ------------------*/
$app->get('/:page', function ($page) use($app) {
    $app->render('404.html');
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/


/*------------ router sub path - principal ------------------*/
$app->get('/:page/:subpage/:file', function ($page, $subpage,$file) use($app, $data, $action, $auth) {
    //if($auth){
    try{
        $data['path'] = $action->BPath($page);
        $app->render($page.'/'.$subpage.'/'.$file.'.php', $data);
    }catch (\Exception $e){
        $app->render('404.html');
    }
    //}else{
    //$app->render('admin/login/index.php');
    //}
})->conditions(array('page' => '[a-z]{2,}', 'file' => '[a-z]{2,}', 'file' => '[a-z]{2,}'));
/*---------------- end ------------------------*/



// diretorio inicial ou aparencia padrão

$app->get('/', function () use($app, $data, $auth) {
    if(true){
        try{
            $app->render('admin/index.php', $data);
        }catch (\Exception $e){
            $app->render('404.html');
        }
    }else{
        $app->render('admin/login/index.php');
    }
});
/*---------------- end ------------------------*/


//&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*
//*&*&*&*&*&*&*&*&   Serviços - requisisoes post  *&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&

// retiorna dados do usuario dado o id
$app->post('/user/:id', function($id) use($user){
    echo json_encode($user->selectUser($id), JSON_FORCE_OBJECT);
});











//&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*
//*&*&*&*&*&*&*&*&   POST's  enviados por ajax  *&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&
//*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&*&


// users ajax

$app->post('/user/create', function() use($user){
    $user->newUser($_POST);
});

$app->post('/user/d', function(){
    echo "asdasd";
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

// --- fim

$app->run();
