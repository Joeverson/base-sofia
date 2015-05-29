<?php
include_once "../../../../libs/pkw.db.php";
include_once "../../../../controller/cms.control.php";
include_once "../../../../libs/pkw.function.php";
include_once "../model/camara.db.inc";

$db = new camaraDb();
$fn = new ACTIONS();

if(empty($_POST))
    exit;

echo $db->updateCamara($fn->prepareArrayDoublePointer($_POST)); // vai retornar a quantidade de linhas afetadas


