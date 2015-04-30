<?
include_once "controller/cms.control.php";
include_once "libs/pkw.function.php";

$class = new control(); // instancia da classe de controle
$action = new ACTIONS();


// instanciações de libs
$app = $class->_SLIM();
$signIn = $class->_LOGIN();
$user = $class->_USER();


$data = array('path' => $action->BPath(), 'file'=>$class->_FILE(), 'url' => $action->urlPath());




//resolve o login
$app->post('/login', function () use($signIn) {
    if(!empty($_POST['pass']))
        $signIn->singIn('ironmonkey');
});
/*---------------- end ------------------------*/







//*&% colocar qualquer outra uri importante antes deste cod abaixo pois ele ira emviar para as pastas em models.

// carregar paginas extras.. outras aparencias.



/*------------ router main ------------------
$app->get('/:page', function ($page) use($app, $action,$class) {
    try{
        $app->render($page.'/index.php',array('path' => $action->BPath($page), 'file'=>$class->_FILE()));
    }catch (\Exception $e){
        $app->render('404.html');
    }
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/



/*------------ router sub path - principal ------------------*/
$app->get('/:page/:subpage', function ($page, $subpage) use($app, $data, $action) {
   // try{
        $data['path'] = $action->BPath($page);
        $app->render($page.'/'.$subpage.'/index.php', $data);
    //}catch (\Exception $e){
       // $app->render('404.html');
    //}
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/

/*------------ router sub path - principal ------------------*/
$app->get('/:page/:subpage/:file', function ($page, $subpage,$file) use($app, $data, $action) {
    try{
        $data['path'] = $action->BPath($page);
        $app->render($page.'/'.$subpage.'/'.$file.'.php', $data);
    }catch (\Exception $e){
        $app->render('404.html');
    }
})->conditions(array('page' => '[a-z]{2,}', 'file' => '[a-z]{2,}', 'file' => '[a-z]{2,}'));
/*---------------- end ------------------------*/



// diretorio inicial ou aparencia padrão

$app->get('/', function () use($app, $data) {
    try{
        $app->render('admin/index.php', $data);
    }catch (\Exception $e){
        $app->render('404.html');
    }
});
/*---------------- end ------------------------*/




$app->run();
