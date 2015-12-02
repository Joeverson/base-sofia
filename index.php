<?php
include "modules/admin/widgets/header.php";
include "modules/admin/widgets/sidebar.php";

$db = new modules\admin\artigos\model\DBArtigos;

?>

<!-- Square card -->
<style>
    .demo-card-square.mdl-card {
        width: 320px;
        height: 320px;
    }
    .demo-card-square > .mdl-card__title {
        color: #fff;
        background:url('<?=$endereco ?>includes/img/lendo.jpg') bottom right 15% no-repeat #46B6AC;
    }
    .demo-card-wide.mdl-card {
        width: 512px;
    }
    .demo-card-wide > .mdl-card__title {
        color: #fff;
        height: 176px;

    }

    .mdl-card__title input, .mdl-card__title textarea{
        color: #1c1c1c;
    }

    .demo-card-wide > .mdl-card__menu {
        color: #fff;
    }
    .mdl-card__supporting-text{
        background-color: #ffffff;
    }
    .green{
        color:#8BC34A;
    }

    .articles-search input {
        border:none;
        outline:none;
        background: transparent;
        width:95%;
        padding: 20px 0;
    }

    .articles-done.mdl-card {
        height: 320px;
        margin: 10px 20px;
        padding:0;
    }
    .articles-done > .mdl-card__title {
        color: #fff;
        padding: 0;
    }
</style>

<div class="container" style="margin-top: 30px; margin-bottom: 50px;">
    <div class="row">
        <!--criaçao de novos projetos-->
        <form id="form" class="form-glass urlForm" data-reload data-url="<?=$endereco?>admin/artigos/controller/save.artigo.php">
            <div class="col-md-12">
                <!-- Wide card with share menu button -->
                <div class="mdl-card mdl-shadow--2dp col-md-12 card-create-project">
                    <h3 class="text-center text-capitalize">Criar novo artigo</h3>
                    <div class="text-right"><a href="category"><i class="fn fn-plus"></i> Adicionar uma nova categoria?</a></div>
                    <div class="mdl-card__title">
                        <div class="col-md-8">
                            <div class="row font-slabo-2x">
                                <input type="text" name="title" id="title" placeholder="Titulo: Atirei o pau no gato!!" style="margin:30px 0; font-weight: bold; font-size:1.5em"/>
                                <input type="hidden" name="edit" value="false" id="edit-article"/>
                                <input type="hidden" name="id" value="" id="edit-article-id"/>
                                <input type="hidden" name="old_cat" value="" id="edit-article-cat"/>
                            </div>
                            <div class="row">
                                <textarea name="description" id="description" rows="10" style="width: 100%" Placeholder="Texto: o gatinho era verde, mas eu joguei agua nele e depois ele ficou vermelhor de reiva..oxê"></textarea>
                            </div>
                            <div class="row">
                                <div class="">
                                    <!-- btn img -->
                                    <input type="file" name="img" id="input-img" style="display:none;"/>
                                    <div style="margin-top: 30px;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
                                        <button type="button" class="mdl-button mdl-js-button mdl-button--primary btn-click-img">
                                            Adicionar Imagem
                                        </button>
                                    </div>
                                    <!-- btn img -->
                                </div>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <button type="submit" class=" mdl-button mdl-js-button mdl-js-ripple-effect btn-success">
                                    Salvar
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <select name="cat_artigo" class="form-glass col-md-12" style="padding: 10px;">
                                    <option value="-1" style="color:#808080">Escolha a categoria do artigo</option>
                                    <?php foreach($db->allCategory() as $cat){?>
                                        <option value="<?php echo $cat['id_category'];?>" style="padding: 10px;"><?php echo $cat['category'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="img-show" style="height:300px; display: block;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row" style="margin-top: 70px;">

        <!-- search article -->

        <div class="row" style="margin-bottom: 40px;">
            <div class="articles-search mdl-card mdl-shadow--2dp col-md-12">
                <div class="col-md-12">
                    <input type="text" id="search-artigos" name="article" placeholder="Busque por aqui algum artigo..."/>
                </div>
            </div>
        </div>

        <!-- /search article-->


        <div class="row itens" style="max-height: 400px; overflow-y: scroll;">
            <?php $i = 0; foreach($db->getLast("all", 10) as $ar){?>
                <!-- Square card -->
                <div class="articles-done mdl-card mdl-shadow--2dp col-md-3" id="id<?=$i?>">
                    <div class="mdl-card__title mdl-card--expand" style="background:url('<?=$endereco?>includes/img/projects/<?=$ar['img']?>') no-repeat center / cover #46B6AC;">
                        <h2 class="mdl-card__title-text"></h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <?=$ar['title']?>
                    </div>
                    <div class="mdl-tooltip mdl-tooltip--large" for="id<?=$i?>" style="background: #00C853; margin-top:-150px;">
                        Categoria <?=$ar['category']?>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <div class="col-md-8">
                            <a data-url="<?=$endereco?>admin/artigos/controller/edit.php" data-id="<?=$ar['id_artigo']?>" class=" action-article mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="color:#00C853">
                                Editar
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a data-url="<?=$endereco?>admin/artigos/controller/delete.php" data-id="<?=$ar['id_artigo']?>" class=" action-article mdl-button mdl-button--colored mdl-js-button btn-danger mdl-js-ripple-effect" style="color:white">
                                Deletar
                            </a>
                        </div>
                    </div>
                </div>
            <?php $i++; }?>
        </div>
    </div>

    <script>
        $(function(){

            //click para abrir a imagem
            $('.btn-click-img').on("click", function(){
                $('#input-img').trigger('click').imgBG(".img-show");
            });

            /**
             * funcção search recebe uma url e uma função callback para poder
             * fazer loop.. no caso ele é um each interno onde vc diz de onde quer pegar determinada informação
             * e para onde vai mandar e o retorno é um json.
             * */
            $('#search-artigos').search('<?=$endereco?>admin/artigos/controller/search.php', function(i){
                $('.itens').html('<div class="articles-done mdl-card mdl-shadow--2dp col-md-3">'+
                    '<div class="mdl-card__title mdl-card--expand" style="background:url(<?=$endereco?>includes/img/projects/'+ i.img +'?>) no-repeat center / cover #46B6AC;">'+
                        '<h2 class="mdl-card__title-text"></h2>'+
                    '</div>'+
                    '<div class="mdl-card__supporting-text">'+
                        i.title+
                    '</div>'+
                    '<div class="mdl-card__actions mdl-card--border">'+
                        '<div class="col-md-8">'+
                            '<a data-url="<?=$endereco?>admin/artigos/controller/edit.php" data-id="'+ i.id_artigo +'?>" class=" action-article mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="color:#00C853">'+
                                'Editar'+
                            '</a>'+
                        '</div>'+
                        '<div class="col-md-4">'+
                            '<a data-url="<?=$endereco?>admin/artigos/controller/delete.php" data-id="'+ i.id_artigo +'" class=" action-article mdl-button mdl-button--colored mdl-js-button btn-danger mdl-js-ripple-effect" style="color:white">'+
                                'Deletar'+
                            '</a>'+
                        '</div>'+
                    '</div>'+
                '</div>');
            });


            /**
             * essa parte aqui é responsavel por pegar as informações sobre a qual se quer editar
             * **/
            $(".action-article").on("click", function(){
                var id = $(this).data("id");
                var url = $(this).data("url");

                console.log(id);

                $.ajax({
                    url: url,
                    type: "post",
                    datatype: "json",
                    data: "id="+id,
                    before:function(){
                        notification.loading("Buscando informações");
                    },
                    success:function(e){
                        var json = JSON.parse(e);
                        $("#title").val(json.title);
                        $("#description").val(json.description);
                        $(".img-show").attr("src", '<?=$endereco?>includes/img/projects/'+json.img);
                        $("#edit-article").val('true');
                        $("#edit-article-id").val(json.id_artigo);
                        $("#edit-article-cat").val(json.cat_artigo);
                        $("body").scrollTop(0);
                    },
                    error:function(){}
                });
            });
        });
    </script>

    <?php include "modules/admin/widgets/rodape.php"; ?>
