<?php

include_once "../model/vereador.db.inc";
include_once "../../../../controller/cms.control.php";
include_once "../../../../libs/pkw.function.php";

$db = new dbVereador();
$fn = new ACTIONS();

if(empty($_POST))
    exit;

echo ($db->deleteVereador($_POST['id_vereador'])); // vai retornar a quantidade de linhas afetadas