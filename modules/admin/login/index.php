<?php include "modules/admin/widgets/header.php"; ?>

<link href="<?=$endereco ?>admin/login/css/style.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <form action="<??>login" method='post' class="form-login">

        <div class="header">
            <a href="#" class="link-head-left"></a>
            <span>Base de Sistemas / CMS</span>
            <a href="javascript:void(0);" tabindex="1" class="link-head-right main-item"></a>
            <div class="config-box">
            </div>
        </div>

        <div class="avatar"><img src="<?=$endereco ?>includes/img/logoUni.png" alt=""></div>

        <div class="inputs">
            <input name="name" type="text" required="" placeholder="Usuário">
            <input name="pass" type="password" required="" placeholder="Senha">
            <div class="button-login"><input type="submit" value="Entrar"></div>
        </div>

        <div class="footer-login">
        </div>
    </form>
</div>

<script>

    <?php if(isset($notAceppt) && $notAceppt){?>
        $(function(){notification.error('Senha ou E-mail inválido');});
    <?php } ?>

</script>

</body>
<?php
include "modules/admin/widgets/rodape.php";
?>