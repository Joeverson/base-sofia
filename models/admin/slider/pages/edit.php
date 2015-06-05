<?php
include_once "../../../../libs/pkw.db.php";
include "../models/slider.db.inc";
$db = new dbSlider();
$slider = $db->selectSlider($_POST['id']);
?>
    <div class="col-md-12 urlTrasiction" data-url="../models/admin/slider/controller/edit.php">
        <div class="row">
            <h4>Titulo</h4>
            <input type="text"  name="title" class="form-control" value="<?=$slider['title']?>"/>
        </div>
        <div class="row">
            <h4>imagem</h4>
            <input type="file" name="img" class="form-control"/>
        </div>
        <div class="row" style="margin: 0 0 30px 0;">
            <h4>texto</h4>
            <textarea name="text" rows="5" class="form-control"><?=$slider['text']?></textarea>
        </div>
    </div>
    <input type="hidden" name="id_slider" value="<?=$_POST['id']?>"/>