<?php
include_once 'libs/pkw.function.php';
$action  = new ACTIONS();
$endereco = $action->urlPath();


?>
<!DOCTYPE html>
<!-- saved from url=(0041)http://airtheme.net/demo/loginform/black/ -->
<html lang="en" class="body-error"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Dom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=$endereco ?>admin/login/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


</head>

<body>

<div id="wrapper">

    <form action="/Dropbox/sophiacms/login" class="form-login" method="post">

        <div class="header">
            <a href="#" class="link-head-left"><i class="fa fa-bed"></i></a>
            <span>Login</span>
            <a href="javascript:void(0);" tabindex="1" class="link-head-right main-item"><i class="fa fa-bug"></i></a>
            <div class="config-box">
                <!--div class="colors">
                    <a href="javascript:chooseStyle('blue-theme', 30)"><img src="blue.png" alt=""></a>
                    <a href="javascript:chooseStyle('orange-theme', 30)"><img src="orange.png" alt=""></a>
                    <a href="javascript:chooseStyle('green-theme', 30)"><img src="green.png" alt=""></a>
                    <a href="javascript:chooseStyle('none', 30)"><img src="red.png" alt=""></a>
                    <div class="clear"></div>
                </div>
                <div class="style-bg">
                    <a href="#" class="active">Feedback</a>
                    <a href="http://google.com.br">Go Google!</a>
                </div-->
            </div>
        </div>

        <div class="avatar"><img src="<?=$endereco ?>includes/img/marca.png" alt=""></div>

        <div class="inputs">
            <input name="user" type="text" required="" placeholder="Usuário">
            <input name="pass" type="password" required="" placeholder="Senha" values="ironmonkey">


            <div class="link-1">
                <input type="checkbox" id="c2" name="cc" checked="checked">
                <label for="c2"><span></span> Lembre-me</label>
            </div>
            <div class="link-2"><a href="http://airtheme.net/demo/loginform/black/forgot-password.html">Esqueceu sua Senha?</a></div>
            <div class="clear"></div>

            <div class="button-login"><input type="submit" value="Sign in"></div>
        </div>

        <div class="footer-login">
            <!--ul class="social-links">
                <li class="twitter"><a href="http://airtheme.net/demo/loginform/black/#"><span>twitter</span></a></li>
                <li class="google-plus"><a href="http://airtheme.net/demo/loginform/black/#"><span>google</span></a></li>
                <li class="facebook"><a href="http://airtheme.net/demo/loginform/black/#"><span>facebook</span></a></li>
            </ul-->
        </div>


    </form>




</div>





<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="jquery.min.js"></script>
<script src="styleswitcher.js"></script>





</body></html>