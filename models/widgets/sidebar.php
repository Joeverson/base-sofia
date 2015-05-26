<?php
include_once 'libs/pkw.function.php';

$action  = new ACTIONS();
$url = $action->urlModels();
$urlAjax = $action->baseUrlAjax();

$name = $_SESSION['user']['name'];

?>

<!-- div de notificações -->
<div class="alert alert-success alert-dismissable notification">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong></strong>
</div>
<!-- /div de notificações -->

<!--top menu-->
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="z-index: 10">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand nopadding" href="<?=$action->adminUrl()?>"><img src="<?=$url?>includes/img/marca.png" style="width: 40%" alt=""/></a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <p class="navbar-text navbar-right"><span class="text-success">Gerenciador de Conteúdo </span> <?=$name?> logado - <a class="navbar-link" href="<?=$urlAjax?>logout"><b>Sair</b></a></p>

                    <!--form class="navbar-form navbar-right" role="search">
                          <div class="form-search search-only">
                              <i class="search-icon glyphicon glyphicon-search"></i>
                              <input class="form-control search-query">
                          </div>
                      </form-->
                </div>
            </div>
        </nav>
    </div>
</div>
<body>
<div id="wrapper">
    <div class="overlay"></div>
    <?php
        include "models/widgets/menu.php";
    ?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
    </div>
