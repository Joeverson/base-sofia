<?php
include "models/widgets/topo.php";
include "models/widgets/sidebar.php";
include "models/admin/articles/models/db.articles.php";
$DBArticles = new DBArticles();

$artigos = $actions->_DB()->getXFromTable("noticias", "date_register", "DESC");

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
            <div class="col-md-3">
                <div class="thumbnail">
                    <img class="img-rounded" src="<?= $endereco ?>site/includes/images/noticias/<?= $artigo['image'] ?>">
                    <div class="caption text-center">
                        <h3><?= $artigo['title'] ?></h3>
                         <p><?= $artigo['subtitle'] ?></p>
                        <p>

                            <a href="#" data-toggle="modal" data-target="#editarartigo" data-id="<?= $artigo['id'] ?>" data-titulo="<?= $artigo['title']  ?>" class="btn fn btn-warning btn-editar" role="button">Editar</a>
                           <a href="#"  data-id="<?= $artigo['id'] ?>" data-titulo="<?= $artigo['title']  ?>" class="btn btn-default btn-excluir"  role="button">Excluir</a></p>
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
                                        <input type="text" name="subtitle" class="form-control" maxlength="200" placeholder="Subtitulo" required="required">
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
                                        <input type="file" name="pdf" class="form-control" >
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
                                        <textarea class="form-control textEdit col-md-12" rows="13" name="text" placeholder="Notícia" ></textarea>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row novoartigo" style="display: none">
            <div class="modal-footer save-in-footer col-md-12">
                <a type="button" style="display:none" class="btn btn-default add_noticia" >Cancelar</a>
                <input type="submit" class="btn btn-success" value="Salvar">
            </div>
        </div>
    </form>
    </div>
<!-- Modal Editar -->
<div class="modal fade" id="editarartigo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edição de notícia</h4>
            </div>
            <form action="<?= $baseUrl ?>articles/new" method="post">
                <div class="modal-body">

                    <div class="row novoartigo" >
                            <div class="col-md-12">
                                <div class="modal-dialog notice">
                                    <p class=".nome_noticia"></p>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <!--label>Name</label-->
                                            <input type="text" name="title" class="form-control edit_title" placeholder="Titulo" required="required">
                                        </div>
                                        <div class="col-xs-5">
                                            <!--label>Email</label-->
                                            <input type="text" name="subtitle" class="form-control edit_subtitle" maxlength="200" placeholder="Subtitulo" required="required">
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 10px 0 0 0;">
                                        <div class="col-xs-6">
                                            <label>Upload de PDF(opcional)</label>
                                            <input type="file" name="pdf" class="form-control" >
                                        </div>
                                        <div class="col-xs-5">
                                            <input type="text" name="pdftitulo" class="form-control edit_pdftitulo" placeholder="Título do PDF">
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 30px 0 0 0;">
                                        <div class="col-xs-11">
                                            <label>Categorias</label>
                                            <div class="row">
                                                <div class="col-md-11">
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
                                        <div class="col-xs-8">
                                            <input type="text" name="novacategoria" id="category" placeholder="Insira uma nova categoria e clique no botão ao lado" class="form-control"/>
                                        </div>
                                        <div class="col-xs-2">
                                            <a class="btn btn-success" id="createCategory" href="javascript:void()" ><i class="fa fa-plus"></i> Criar Categoria</a>
                                        </div>

                                    </div>
                                    <div class="row" style="padding: 20px 0 0 0;">
                                        <div class="col-xs-11">
                                            <label>Resumo</label>
                                            <textarea name="resume" class="form-control col-md-12 edit_resume" required="" rows="3" placeholder="Breve resumo..."></textarea>
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 30px 0 50px 0;">
                                        <div class="col-xs-11">
                                            <label>Noticia</label>
                                            <textarea class="form-control textEdit col-md-12 edit_text" rows="13" name="text" placeholder="Notícia" ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal excluir -->
<div class="modal fade" id="excluirartigo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <span><b>Tem certeza de que deseja excluir esta notícia?</b></span>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                <input type="submit" class="btn btn-primary" value="Sim">
            </div>
        </div>
        </form>
    </div>
</div>
</div>

<script>
    $(function(){
        $(".add_noticia").click(function(){
           $(".novoartigo").fadeToggle();
           $(".artigos").fadeToggle();
           $(".add_noticia").fadeToggle();
        });

        $(".btn-excluir").click(function(){
           var id = $(this).data("id");
           var titulo = $(this).data("titulo");

            $("#excluirartigo .modal-dialog .modal-body ").html(titulo);
            $("#excluirartigo .modal-dialog form ").attr("action", "<?= $baseUrl ?>articles/delete/"+id);
            $("#excluirartigo").modal("show");
        });

         $(".btn-editar").click(function(){
                   var id = $(this).data("id");
                   var titulo = $(this).data("titulo");
             $.ajax({
                 url: '<?= $actions->baseUrlAjax() ?>articles/edit/'+id,
                 type: 'post',
                 datatype: 'html',
                 beforeSend: function(){
                    // $(this).html("Careregando");
                 },
                 success: function(t){
                 },
                 complete: function() {
                     //$('.progress-bar').fadeOut();
                 }
             });

         });


        $('#createCategory').on("click", function(){
            var categoria = ($('#category').serialize());
            $.ajax({
                url: '<?= $actions->baseUrlAjax() ?>articles/newcategory',
                type: 'post',
                data: categoria,
                datatype: 'html',
                beforeSend: function(){
                   // $('.progress-bar').show();
                },
                success: function(t){
                    if ($('#category').val() != '')
                         $('#selectCategory').append('<option value="'+t+'">'+$('#category').val()+'</option>');
                },
                complete: function() {
                    //$('.progress-bar').fadeOut();
                }
            });
        });
    });
</script>

<?php
include "models/widgets/rodape.php";
?>
