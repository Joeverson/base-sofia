<?php
include_once 'libs/pkw.function.php';
$action  = new ACTIONS();
$endereco = $action->urlPath();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>DOM - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link global-->
    <link href="<?=$endereco ?>includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$endereco ?>includes/bootflat/css/bootflat.min.css" rel="stylesheet">


    <!-- link especifico -->
    <link href="<?=$endereco ?>includes/css/style.css" rel="stylesheet">

    <!--link global-->
    <script src="<?=$endereco ?>includes/js/jquery-1.10.1.min.js"></script>
    <script src="<?=$endereco ?>includes/js/bootstrap.min.js"></script>
    <script src="<?=$endereco ?>includes/bootflat/js/icheck.min.js"></script>
    <script src="<?=$endereco ?>includes/bootflat/js/jquery.fs.selecter.min.js"></script>
    <script src="<?=$endereco ?>includes/bootflat/js/jquery.fs.stepper.min.js"></script>
    <!-- Bootstrap >
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!-- Bootflat's JS files.>
    <script src="https://bootflat.github.io/bootflat/js/icheck.min.js"></script>
    <script src="https://bootflat.github.io/bootflat/js/jquery.fs.selecter.min.js"></script>
    <script src="https://bootflat.github.io/bootflat/js/jquery.fs.stepper.min.js"></script>
    <!-- Bootflat's JS files.-->
</head>
