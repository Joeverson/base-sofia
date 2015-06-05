<?php
include_once "../../../../libs/pkw.db.php";
include_once "../../../../controller/cms.control.php";
include_once "../../../../libs/pkw.function.php";
include_once "../models/slider.db.inc";

$db = new dbSlider();
$fn = new ACTIONS();

if(empty($_POST))
    exit;

//var_dump($_POST);
//exit;

if(!empty($_FILES['img']))
    if(move_uploaded_file($_FILES['img']['tmp_name'], '../photos/'.$_FILES['img']['name'])){
        $_POST['img'] = $_FILES['img']['name'];
        echo $db->updateSlider($fn->prepareArrayDoublePointer($_POST), $_POST['id_slider']); // vai retornar a quantidade de linhas afetadas
    }
    else
        echo $db->updateSlider($fn->prepareArrayDoublePointer($_POST), $_POST['id_slider']); // vai retornar a quantidade de linhas afetadas
