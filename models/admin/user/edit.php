<?php
$file->includeModel("widgets/topo.php");
$file->includeModel("widgets/sidebar.php");

?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="pricing">
                <ul>
                    <li class="unit price-success active col-md-12">
                        <form id="formEditUser">
                            <div class="price-title">
                                <h3>Editar Usuário <span></span></h3>
                                <p>Clique no usuário para edita-lo</p>
                            </div>
                            <div class="price-body">

                                <div class="price-body editForm" data-url="user/edit/<?//=$id?>">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <select class='form-control' name="cat" id="cat">
                                                <?php foreach($cat as $c){?>
                                                    <option value="<?=$c["id_tipo"]?>"><?=$c["name_cat"]?></option>
                                                <?}?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" id="name2" name='name' class="form-control" placeholder="Usuário" required="" value="<?//=$name?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" id="email2" class="form-control" name="email" placeholder="E-mail" required="" value="<?//=$email?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="password" id='pass3' name="pass" class="form-control" placeholder="Senha" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="password" id="pass4" class="form-control" placeholder="Re-Senha" >
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="" id="id"/>
                            </div>
                            <div class="price-foot">
                                <button type="submit" class="btn btn-success"><i class="fa fa-hdd-o"></i> Salvar</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!--lista de ativos-->
        <div class="col-md-6">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Clique no usuário para edita-lo</h4>
                </a>
                <?php foreach($user->selectAllUser() as $u){ ?>
                    <a href="#" class="list-group-item" data-id="<?=$u['id']?>">
                        <h4 class="list-group-item-heading"><?=$u['name']?> <i class="fa fa-trash-o trash fn" data-title="Apagando usuário..." data-url="user/delete" data-id="<?=$u['id']?>" data-toggle="modal" data-target=".modalUsers"></i>
                        </h4>
                        <p class="list-group-item-text">Tipo de Usuário: <?=$u['name_cat']?></p>

                    </a>
                <?php } ?>
            </div>
        </div>


    </div>
</div>


<!-- Modal -->
<div class="modal fade modalUsers" id="modalUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">...</h4>
            </div>
            <form id="formEditUser">
                <!--body-->
                <div class="modal-body"></div>
                <!--/body-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>



</body>
<script>
    $(function(){
        $("#formEditUser").on("submit",function(){
            var data = $( "#formEditUser" ).serialize();

            var pass = $("#pass");
            var pass2 = $("#pass2");
            var id = $("#id").val();


            if((pass.val() != pass2.val())){
                alert("error");
            }else{
                $.ajax({
                    url: '<?=$baseUrlAjax?>user/edit/'+id,
                    type: 'post',
                    data: data,
                    datatype: 'html',
                    beforeSend: function(){
                        $('.price-title').append('');
                    },
                    success: function(e){
                        notification.ok('Enviado com Sucesso!!');
                        $('body').prepend(e);
                    }
                });
            }

            return false;
        });


// ajax para pegar os dados do usuario que foi clicado
        $('.list-group-item').on('click', function(){
            var name = $("#name2");
            var email = $("#email2");
            var idEdit = $("#id");
            var id = $(this).data('id');

            $.ajax({
                url: '<?=$baseUrlAjax?>user/'+id,
                type: 'post',
                data: "",
                datatype: 'json',
                beforeSend: function(){
                    $('.price-title span').show();
                },
                success: function(e){
                    $('.price-title span').hide();
                    var json = $.parseJSON(e);
                    console.log(json);
                    name.val(json.name);
                    email.val(json.email);
                    idEdit.val(id);
                }
            });
        });



        // ajax of actions

        $(".fn").on("click", function(){
            var url = $(this).data('url');
            var title = $(this).data('title');
            var id = $(this).data('id');


            $.ajax({
                url: '<?=$baseUrlAjax?>'+url,
                type: 'post',
                data: "id="+id,
                datatype: 'html',
                beforeSend: function(){
                    //$('.progress-bar').show();
                },
                complete: function() {
                    //$('.progress-bar').fadeOut();
                },
                success: function(e){
                    $('.modal-title').html(title);
                    $('.modal-body').html(e);
                    $('#modalUses').modal('show')
                }
            });
        });
    });
</script>
</html>