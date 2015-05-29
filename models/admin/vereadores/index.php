<?php
include_once "models/widgets/topo.php";
include_once "models/widgets/sidebar.php";
include_once "libs/pkw.db.php";
include_once "models/admin/vereadores/model/vereador.db.inc";
$vereador = new dbVereador();

?>

<div class="row">
    <div class="col-md-12 inside">
        <div class="row">
            <div class="col-md-12">
                <h2 class="pull-left">Vereadores</h2>
                <a class="pull-right btn btn-large btn-success fn" href="javascript:void(0)" data-title="Adicionando novo vereador..." data-id="" data-url="models/admin/vereadores/pages/create.php" data-toggle="modal" data-target="#modalUsers">Adicionar Vereador</a>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <?php foreach ($vereador->selectAllVereadores() as $v){ ?>
                    <div class="col-md-3 ">
                        <div class="thumbnail">
                            <img class="img-rounded" src="<?= $actions->urlModels() ?>admin/vereadores/uploads/<?= empty($v['img'])? 'exp.png' : $v['img']; ?>">

                            <div class="caption text-center">
                                <h3><?=$v['name']?></h3>
                                <small><?=$v['partido']?></small>
                                <br/>
                                <p style="margin: 20px 0 0 0">
                                    <a href="javascript:void(0)" class="btn btn-warning fn" role="button" data-title="Editando usuário..." data-id="<?=$v['id_vereador']?>" data-url="models/admin/vereadores/pages/edit.php" data-toggle="modal" data-target="#modalUsers">Editar</a>
                                    <a href="javascript:void(0)" class="btn btn-default fn" role="button" data-title="Deletando usuário..." data-id="<?=$v['id_vereador']?>" data-url="models/admin/vereadores/pages/delete.php" data-toggle="modal" data-target="#modalUsers">Excluir</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
    <script>

    </script>
<?php
include "models/widgets/rodape.php";

?>