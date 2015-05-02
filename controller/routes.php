<?
include_once "controller/cms.control.php";
include_once "libs/pkw.function.php";
include_once "libs/cms.session.php";
SESSION::on();

$class = new control(); // instancia da classe de controle
$action = new ACTIONS();


// instanciações de libs
$app = $class->_SLIM();
$signIn = $class->_LOGIN();
$user = $class->_USER();


$data = array('path' => $action->BPath(), 'file'=>$class->_FILE(), 'url' => $action->urlPath());



// mandados por post pelos formularios e enviado as informações p seus controllers
//resolve o login
$app->post('/login', function () use($signIn, $app) {
    if(!empty($_POST['pass']))
        if($info = $signIn->singIn($_POST['pass'])){
            SESSION::setUser($info); // guardando dados do usuario
            header("location: /");
        }else{
            $app->render('admin/login/index.php');
        }
});
/*---------------- end ------------------------*/







//*&% colocar qualquer outra uri importante antes deste cod abaixo pois ele ira emviar para as pastas em models.

// carregar paginas extras.. outras aparencias.

/*------------ router sub path - principal ------------------*/
$app->get('/:page/:subpage', function ($page, $subpage) use($app, $data, $action) {
  if(SESSION::auth()){
       try{
          $data['path'] = $action->BPath($page);
          $app->render($page.'/'.$subpage.'/index.php', $data);
      }catch (\Exception $e){
         $app->render('404.html');
      }
  }else{
      $app->render('admin/login/index.php');
  }
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/

/*------------ router sub path - principal ------------------*/
$app->get('/:page/:subpage/:file', function ($page, $subpage,$file) use($app, $data, $action) {
    if(SESSION::auth()){
        try{
            $data['path'] = $action->BPath($page);
            $app->render($page.'/'.$subpage.'/'.$file.'.php', $data);
        }catch (\Exception $e){
            $app->render('404.html');
        }
    }else{
        $app->render('admin/login/index.php');
    }
})->conditions(array('page' => '[a-z]{2,}', 'file' => '[a-z]{2,}', 'file' => '[a-z]{2,}'));
/*---------------- end ------------------------*/



// diretorio inicial ou aparencia padrão

$app->get('/', function () use($app, $data) {
    if(SESSION::auth()){
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




$app->run();
