<?php
include "modules/admin/widgets/header.php";
?>


<link href="http://314.bl.ee/modules/admin/login/css/style.css" rel="stylesheet">
		<!-- Wide card with share menu button -->
<style>
	.demo-card-wide.mdl-card {
	  width: 512px;
	}
	.demo-card-wide > .mdl-card__title {
        color: #fff;
        height: 176px;
        background: url('<?= $endereco ?>includes/img/logomarca.png') no-repeat;
        background-position: center;
        background-color:#049EFB;
	}
	.demo-card-wide > .mdl-card__menu {
	  color: #fff;
	}
</style>
</head>

<body>

<div id="wrapper">

    <form action="<?=$endereco?>../login" method='post' class="form-login">
		<div class="demo-card-wide mdl-card mdl-shadow--2dp">
		  <div class="mdl-card__title">
			<!--h2 class="mdl-card__title-text">Welcome!!</h2-->
		  </div>
		  <div class="mdl-card__supporting-text">
		   		<div class="row">
					<div class="col-md-6">
						<input name="name" class='col-md-12' style='border:none;' type="text" required="" placeholder="Usuário">
					</div>
					<div class="col-md-6">
						<input name="pass" type="password" style='border:none;' class='col-md-12' required="" placeholder="Senha">
					</div>
			  	</div>
		  </div>
		  <div class="mdl-card__actions mdl-card--border">
			<button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			  LOGIN
			</button>
		  </div>
		  <div class="mdl-card__menu">
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