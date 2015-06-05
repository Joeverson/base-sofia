<?php
include_once "models/widgets/topo.php";
include_once "models/widgets/sidebar.php";
include_once "libs/pkw.db.php";
include_once "models/admin/slider/models/slider.db.inc";
$slider = new dbSlider();

?>
    <style>
        .contain-slider{
            box-shadow: 0 0 7px -2px black;
            border-radius: 4px;
            padding: 10px;
        }
        #img{
            display: none;
        }
        img{
            max-height: 200px;
        }
        .slider-exists{
            margin-top: 5%;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-10 contain-slider col-md-offset-1">
                <form id="form-slider" data-url="../models/admin/slider/controller/create.php">
                    <h3 class="text-center">Configuração do Slider</h3>
                    <input type="file" name="img" id="img"/>
                    <div class="col-md-5">
                        <div class="col-sm-12 col-md-12">
                            <div class="thumbnail">
                                <img class="img-rounded imagem-slider">
                                <div class="caption text-center">
                                    <p><a href="#" class="btn btn-warning btn-img" role="button">Buscar</a> <button type="submit" class="btn btn-default save-slider"><i class="fa fa-hdd-o"></i> Salvar Slider</button></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="row">
                            <h4>Titulo</h4>
                            <input type="text"  name="title" class="form-control"/>
                        </div>
                        <div class="row">
                            <h4>texto</h4>
                            <textarea name="text" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row slider-exists">
            <div class="container">
                <h3 class="text-center">Sliders Ativos</h3>
                <?php foreach ($slider->selectAllSlider() as $v){ ?>
                    <div class="col-md-3 ">
                        <div class="thumbnail">
                            <img class="img-rounded" src="<?= $actions->sitePath() ?>includes/images/sliders/<?= empty($v['img'])? 'exp.png' : $v['img']; ?>">

                            <div class="caption text-center">
                                <h3><?=$v['title']?></h3>
                                <small><?=$v['text']?></small>
                                <br/>
                                <p style="margin: 20px 0 0 0">
                                    <a href="javascript:void(0)" class="btn btn-warning fn" role="button" data-title="Editando slider..." data-id="<?=$v['id_slider']?>" data-url="models/admin/slider/pages/edit.php" data-toggle="modal" data-target="#modalUsers">Editar</a>
                                    <a href="javascript:void(0)" class="btn btn-default fn" role="button" data-title="Deletando slider..." data-id="<?=$v['id_slider']?>" data-url="models/admin/slider/pages/delete.php" data-toggle="modal" data-target="#modalUsers">Excluir</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $(".btn-img").on("click", function(){
                $("#img").trigger("click").imgShow();
            });


            $("#form-slider").on("submit",function(){
                event.preventDefault();
                var url = $(this).data('url');

                $.ajax({
                    url: url,
                    type: 'post',
                    data:  new FormData(this),
                    datatype: 'html',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        notification.loading('salvando...');
                    },
                    complete: function() {

                    },
                    success: function(e){
                        notification.ok("novo slider salvo!!");
                        console.log(e);
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);

                    }
                });
            });
        });
    </script>


<?php include "models/widgets/rodape.php"; ?>