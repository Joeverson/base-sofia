<?php
include_once "../../../../libs/pkw.db.php";
include_once "../model/vereador.db.inc";
include_once "../../../../controller/cms.control.php";
include_once "../../../../libs/pkw.function.php";


$db = new dbVereador();
$fn = new ACTIONS();

if(empty($_POST))
    exit;

if(move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/'.$_FILES['img']['name'])){
    $_POST['img'] = $_FILES['img']['name'];
    echo $db->insertVereador($fn->prepareArrayDoublePointer($_POST)); // vai retornar a quantidade de linhas afetadas
}
