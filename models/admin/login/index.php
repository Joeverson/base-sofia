<?php
include_once 'libs/pkw.function.php';
$file->includeModel("widgets/topo.php");

$action  = new ACTIONS();
$endereco = $action->urlPath();

?>

<link href="<?=$endereco ?>admin/login/css/style.css" rel="stylesheet">


</head>

<body>

<div id="wrapper">

    <form action="<?=$baseUrlAjax?>login" method='post' class="form-login">

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
            <input name="name" type="text" required="" placeholder="Usuário">
            <input name="pass" type="password" required="" placeholder="Senha">


            <div class="link-1">
                <input type="checkbox" id="c2" name="" checked="checked">
                <label for="c2"><span></span> Lembre-me</label>
            </div>
            <div class="link-2"><a href="http://airtheme.net/demo/loginform/black/forgot-password.html">Esqueceu sua Senha?</a></div>
            <div class="clear"></div>

            <div class="button-login"><input type="submit" value="Entrar"></div>
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


<script>

    <?php if(isset($notAceppt) && $notAceppt){?>
        $(function(){notification.error('Senha ou email invalido!!');});
    <?php } ?>

</script>

</body>
<?php
$file->includeModel("widgets/rodape.php");
?>