<?php
include_once "../../../../libs/pkw.db.php";
include_once "../../../../controller/cms.control.php";
include_once "../../../../libs/pkw.function.php";
include_once "../model/vereador.db.inc";

$db = new dbVereador();
$fn = new ACTIONS();

if(empty($_POST))
    exit;

if(!empty($_FILES['img']))
    if(move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/'.$_FILES['img']['name'])){
        $_POST['img'] = $_FILES['img']['name'];
        echo $db->updateVereador($fn->prepareArrayDoublePointer($_POST), $_POST['id_vereador']); // vai retornar a quantidade de linhas afetadas
    }
else
    echo $db->updateVereador($fn->prepareArrayDoublePointer($_POST), $_POST['id_vereador']); // vai retornar a quantidade de linhas afetadas
