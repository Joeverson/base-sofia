<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>DOM - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link global-->
    <link href="models/includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="models/includes/bootflat/css/bootflat.min.css" rel="stylesheet">


    <!-- link especifico -->
    <link href="models/admin/css/style.css" rel="stylesheet">

    <!--link global-->
    <script src="models/includes/js/jquery-1.10.1.min.js"></script>
    <script src="models/includes/js/bootstrap.min.js"></script>
    <script src="models/includes/bootflat/js/icheck.min.js"></script>
    <script src="models/includes/bootflat/js/jquery.fs.selecter.min.js"></script>
    <script src="models/includes/bootflat/js/jquery.fs.stepper.min.js"></script>
    <!-- Bootstrap >
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!-- Bootflat's JS files.>
    <script src="https://bootflat.github.io/bootflat/js/icheck.min.js"></script>
    <script src="https://bootflat.github.io/bootflat/js/jquery.fs.selecter.min.js"></script>
    <script src="https://bootflat.github.io/bootflat/js/jquery.fs.stepper.min.js"></script>
    <!-- Bootflat's JS files.-->
</head>
<body>
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
                        <a class="navbar-brand nopadding" href="#"><img src="models/includes/img/marca.png" style="width: 40%" alt=""/></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <p class="navbar-text navbar-right"><span class="text-success">Gerenciador de Conteúdo</span>Usuário logado - <a class="navbar-link" href=""><b>Sair</b></a></p>

                      <!-- <form class="navbar-form navbar-right" role="search">
                            <div class="form-search search-only">
                                <i class="search-icon glyphicon glyphicon-search"></i>
                                <input class="form-control search-query">
                            </div>
                        </form> -->
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!--end top menu -->

    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       MENU
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#" id="newArtigo" data-link='models/admin/pages/articles.html' data-toggle="offcanvas"><b>New</b> Artigo</a>
                </li>
                <li>
                    <a href="#" id="ultimosnoticias" data-link='models/admin/pages/dashboard.html' data-toggle="offcanvas">Ultimas Notícias</a>
                </li>
                <li>
                    <a href="#">Team</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Dropdown heading</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="https://twitter.com/maridlcrmn">Follow me</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>

                <div class="row">
                    <div class="col-md-12 pages">


                    </div>
                </div>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="text/javascript">
$(document).ready(function () {


  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;


    trigger.click(function () {
      hamburger_cross();      
    });

 // responsavel por carregar na pagina as pages...
    $('a').click(function(){
        ajaxUrl($(this).data('link'));
        hamburger_cross();
    });



    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});

function ajaxUrl(url){ // usado para trazer as paginas
    $.ajax({
        url:url,
        type:'post',
        data:'',
        datatype:'html',
        success:function(e){
            $('.pages').html(e);
        }
    }).fail(function(e){
        $('.pages').html(e.responseText);
    })
}
</script>
</body>
</html>
