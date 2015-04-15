<?
include_once "controller/control.php";
include_once "libs/pkw.function.php";

$class = new control(); // instancia da classe de controle
$action = new ACTIONS();


// instanciações de libs --
$app = $class->_SLIM();
$signIn = $class->_LOGIN();
$user = $class->_USER();

//resolve o login
$app->post('/login', function () use($signIn) {
    if(!empty($_POST['pass']))
        $signIn->singIn('ironmonkey');
});
/*---------------- end ------------------------*/







//*&% colocar qualquer outra uri importante antes deste cod abaixo pois ele ira emviar para as pastas em models.

// carregar paginas extras.. outras aparencias.

/*------------ router main ------------------*/
$app->get('/:page', function ($page) use($app, $action) {
    try{
        $app->render($page.'/index.php',$action->BPath($page));
    }catch (\Exception $e){
        $app->render('404.html');
    }
})->conditions(array('page' => '[a-z]{2,}'));
/*---------------- end ------------------------*/





// diretorio inicial ou aparencia padrão

$app->get('/', function () use($app, $action, $user) {
    try{
        $app->render('admin/index.php');
    }catch (\Exception $e){
        $app->render('404.html');
    }
});


$app->get('/a', function () use($app, $action, $user) {
        $app->render('includes/index.html');
});
/*---------------- end ------------------------*/




$app->run();