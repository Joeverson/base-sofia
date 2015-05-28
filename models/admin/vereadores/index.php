<?php
include_once "models/widgets/topo.php";
include_once "models/widgets/sidebar.php";
include_once "models/admin/vereadores/model/vereador.db.inc";
$vereador = new dbVereador();
?>

<div class="row">
    <div class="col-md-12 inside">
        <div class="row">
            <h2 class="pull-left">Vereadores</h2>
            <a class="pull-right btn btn-large btn-success addVereador fn" href="javascript:void(0)" data-title="Adicionando novo vereador..." data-id="" data-url="vereadores/viewcreate" data-toggle="modal" data-target="#modalUsers">Adicionar Vereador</a>
        </div>
        <div class="row">
            <div class="container">
                <?php foreach ($vereador->selectAllVereadores() as $v){ ?>
                    <div class="col-md-2 nopadding ">
                        <div class="thumbnail">
                            <img class="img-rounded" src="<?= $endereco ?>admin/vereadores/uploads/<?=$v['img']?>">
                            <div class="caption text-center">
                                <h3><?=$v['name']?></h3>
                                <p><a href="javascript:void(0)" class="btn btn-warning fn" role="button" data-title="Editando usuário..." data-id="" data-url="vereadores/edit" data-toggle="modal" data-target="#modalUsers">Editar</a>
                                    <a href="javascript:void(0)" class="btn btn-default fn" role="button" data-title="Editando usuário..." data-id="" data-url="vereadores/delete" data-toggle="modal" data-target="#modalUsers">Excluir</a></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
           $(".addVereador").click(function(){
                $(".modalAddVereador").modal('show');
           });
        });

    </script>
<?php
include "models/widgets/rodape.php";

?>