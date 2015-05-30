<?php
include_once "models/widgets/topo.php";
include_once "models/widgets/sidebar.php";
include_once "libs/pkw.db.php";
include_once "models/admin/camara/model/camara.db.inc";
$camara = new camaraDb();
$c = $camara->selectAbout();

?>


<div class="container">
    <form id="CamaraSave" class="camaraS" data-url="../models/admin/camara/controller/save.php">
        <div class="row" style="padding: 20px 0 0 0;">
            <div class="col-xs-12">
                <h3>Câmara</h3>
                <textarea name="text" class="form-control col-md-12" required="" rows="10" placeholder="Breve resumo..."><?=$c['text']?></textarea>
            </div>
        </div>
        <div class="row" style="padding: 20px 0 0 0;">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-hdd-o"></i> Salvar</a></button>
            </div>
        </div>
    </form>
</div>


    <script>
        $(function(){
            $("#CamaraSave").on("submit",function(){
                event.preventDefault();
                var url = $(".camaraS").data('url');

                $.ajax({
                    url: url,
                    type: 'post',
                    data:  new FormData(this),
                    datatype: 'html',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $('.progress-bar').show();
                    },
                    complete: function() {
                        $('.progress-bar').fadeOut();
                    },
                    success: function(e){
                        //window.location.reload();
                        console.log(e);

                    }
                });
            });
        });
    </script>



<?php include "models/widgets/rodape.php"; ?>