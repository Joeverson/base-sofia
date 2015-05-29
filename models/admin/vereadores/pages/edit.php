<?php
include "../model/vereador.db.inc";
$db = new dbVereador();
$user = $db->selectVereador($_POST['id']);
?>
<div class="price-body urlTrasiction" data-url="../models/admin/vereadores/controller/edit.php">
    <div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nome" required="" value="<?=$user['name']?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="file" id="file" name="img" class="form-control" placeholder="file" value="">
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                    <input type="date" id="nascimento" name="dt_birth" class="form-control" placeholder="Data de nascimento" required="" value="<?=$user['dt_birth']?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                    <input type="text" id="partido" name="partido" class="form-control" placeholder="Partido" required="" value="<?=$user['partido']?>">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon">@</span>
            <input type="email" id="email2" name="email" class="form-control" placeholder="E-mail" required="" value="<?=$user['email']?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" id="formacao" name="formacao" class="form-control" placeholder="Formação" required="" value="<?=$user['formacao']?>">
        </div>
    </div>
    <div class="col-md-12">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
            <textarea class="form-control textEdit col-md-12" rows="4" placeholder="atividades" name="atividade" id="atividade"><?=$user['atividade']?></textarea>
        </div>
    </div>
</div>

<input type="hidden" name="id_vereador" value="<?=$_POST['id']?>"/>


