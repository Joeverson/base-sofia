<?php
include "models/widgets/topo.php";
include "models/widgets/sidebar.php";
include "models/admin/articles/models/db.articles.php";
$DBArticles = new DBArticles();

$artigos = $actions->_DB()->getXFromTable("noticias", "date_register", "ASC");

?>

<div id="wrapper">
    <div class="overlay"></div>
    <!-- Page Content -->

        <div class="col-md-12 inside">
            <div class="row">
                <h2 class="pull-left">Notícias</h2>
                <a href="#" class="btn btn-info pull-right add_noticia" data-name="Fechar"><i class="more"></i>Adicionar Notícia</a>
            </div>
        </div>
        <div class="row artigos inside">
            <?php
                foreach ($artigos as $artigo){
            ?>
            <div class="col-md-2">
                <div class="thumbnail">
                    <img class="img-rounded" src="<?= $endereco ?>site/includes/images/noticias/<?= $artigo['image'] ?>">
                    <div class="caption text-center">
                        <h3><?= $artigo['title'] ?></h3>
                        <p><?= $artigo['subtitle'] ?></p>
                        <p><a href="#" class="btn btn-warning" role="button">Editar</a>
                            <a href="#" class="btn btn-default" role="button">Excluir</a></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    <form action="<?= $baseUrl ?>articles/new" method="post" enctype="multipart/form-data">
        <div class="row novoartigo" style="display: none">
            <div class="container">
                <div class="col-md-12">
                    <div class="modal-dialog notice">
                                <p>Vamos lá, preparado para adicionar uma nova notícia?</p>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <!--label>Name</label-->
                                        <input type="text" name="title" class="form-control" placeholder="Titulo" required="required">
                                    </div>
                                    <div class="col-xs-6">
                                        <!--label>Email</label-->
                                        <input type="text" name="subtitle" class="form-control" placeholder="Subtitulo" required="required">
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px 0 0 0;">
                                    <div class="col-xs-6">
                                        <label>Upload de Imagem</label>
                                        <input type="file" name="image" class="form-control" placeholder="Subtitulo" required="required">
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px 0 0 0;">
                                    <div class="col-xs-6">
                                        <label>Upload de PDF(opcional)</label>
                                        <input type="file" name="pdf" class="form-control" placeholder="Subtitulo">
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" name="pdftitulo" class="form-control" placeholder="Título do PDF">
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
                                    <div class="col-xs-9">
                                        <input type="text" name="novacategoria" id="category" placeholder="Insira uma nova categoria e clique no botão ao lado" class="form-control"/>
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="btn btn-success" id="createCategory" href="javascript:void()" ><i class="fa fa-plus"></i> Criar Categoria</a>
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

        <div class="row novoartigo" style="display: none">
            <div class="modal-footer save-in-footer col-md-12">
                <a type="button" class="btn btn-default add_noticia" >Cancelar</a>
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
    </form>
    </div>

</div>

<script>
    $(function(){
        $(".add_noticia").click(function(){
           $(".novoartigo").fadeToggle();
           $(".artigos").fadeToggle();
           $(this).fadeToggle();

        });
        $('#createCategory').on("click", function(){
            var categoria = ($('#category').serialize());
            $.ajax({
                url: '<?= $actions->baseUrlAjax() ?>articles/newcategory',
                type: 'post',
                data: categoria,
                datatype: 'json',
                beforeSend: function(){
                   // $('.progress-bar').show();
                },
                success: function(t){
                    $('#selectCategory').append('<option value="'+t+'">'+$('#category').val()+'</option>');
                },
                complete: function() {
                    //$('.progress-bar').fadeOut();
                }
            });
        });
    })
</script>

<?php
include "models/widgets/rodape.php";
?>
