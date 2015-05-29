<?php
include "models/widgets/topo.php";
include "models/widgets/sidebar.php";
include "models/admin/articles/models/db.articles.php";

$DBArticles = new DBArticles();

?>

<div id="wrapper">
    <div class="overlay"></div>
    <!-- Page Content -->
    <form action="<?= $baseUrl ?>articles/new" method="post" novalidate enctype="multipart/form-data">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="modal-dialog notice">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Notícias</h4>
                            </div>
                            <div class="modal-body">
                                <p>Vamos lá, preparado para adicionar uma nova notícia?</p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <!--label>Name</label-->
                                        <input type="text" name="title" class="form-control" placeholder="Titulo" required="">
                                    </div>
                                    <div class="col-xs-6">
                                        <!--label>Email</label-->
                                        <input type="text" name="subtitle" class="form-control" placeholder="Subtitulo" required="">
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px 0 0 0;">
                                    <div class="col-xs-6">
                                        <label>Upload de Imagem</label>
                                        <input type="file" name="image" class="form-control" placeholder="Subtitulo" required="">
                                    </div>
                                </div>
                                <div class="row" style="padding: 30px 0 0 0;">
                                    <div class="col-md-12">
                                        <label>Categorias</label>
                                       <div class="row">
                                           <div class="col-md-12">
                                               <select class='col-md-12 form-control' name="categoria[]" id="selectCategory" multiple>
                                                   <?php foreach($DBArticles->getAllCategorias() as $cat){?>
                                                       <option value="<?=$cat['id_category']?>"><?=$cat['name_category']?></option>
                                                   <?php } ?>
                                               </select>
                                           </div>
                                       </div>
                                    </div>
                                </div>

                                <div class="row" style="padding: 20px 0 0 0;">
                                    <div class="col-xs-3">
                                        <a class="btn btn-success" id="createCategory" href="javascript:void()" ><i class="fa fa-plus"></i> Criar Categoria</a>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" id="category" class="form-control"/>
                                    </div>
                                </div>
                                <div class="row" style="padding: 20px 0 0 0;">
                                    <div class="col-xs-12">
                                        <label>Resumo</label>
                                        <textarea name="resume" class="form-control col-md-12" required="" rows="3" placeholder="Breve resumo..."></textarea>
                                    </div>
                                </div>
                                <div class="row" style="padding: 30px 0 50px 0;">
                                    <div class="col-xs-12">
                                        <label>Noticia</label>
                                        <textarea class="form-control textEdit col-md-12" rows="13" name="text" placeholder="Notícia" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="modal-footer save-in-footer col-md-12">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
    </form>
    </div>

</div>

<script>
    $(function(){
        $('#createCategory').on("click", function(){
            $('#selectCategory').append('<option value="0">'+$('#category').val()+'</option>');
        });
    })
</script>

<?php
include "models/widgets/rodape.php";
?>
