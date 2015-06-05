<?php
include_once "../../../../libs/pkw.db.php";
include_once "../models/slider.db.inc";
include_once "../../../../controller/cms.control.php";
include_once "../../../../libs/pkw.function.php";


$db = new dbSlider();

if(empty($_POST))
    exit;

if(unlink("../../../../models/site/includes/images/sliders/".$db->selectSlider($_POST['id_slider'])['img']))
    echo ($db->deleteSlider($_POST['id_slider'])); // vai retornar a quantidade de linhas afetadas