<?php
$file->includeModel("widgets/topo.php");
$file->includeModel("widgets/sidebar.php");
?>
<div class="row">
    <div class="container">
            <div class="col-md-6">
                <div class="pricing">
                    <ul>
                        <li class="unit price-success active col-md-12">
                            <form id="formCreateUser">
                                <div class="price-title">
                                    <h3>Criar Usuário</h3>
                                    <p>Adicionar novo usuário</p>
                                </div>
                                <div class="price-body">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Usuário" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                            <select name="cat" class="form-control">
                                                <option value="-1">Defina os privilegios do usuário</option>
                                                <?php foreach($user->selectAllCategory() as $c){?>
                                                    <option value="<?=$c["id_tipo"]?>"><?=$c["name_cat"]?></option>
                                                <?}?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="password" id='pass2' class="form-control" placeholder="Senha" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Re-Senha" required="">
                                        </div>
                                    </div>
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
                        <h4 class="list-group-item-heading">Usuários Ativos</h4>
                    </a>
                    <?php foreach($user->selectAllUser() as $u){ ?>
                        <a href="#" class="list-group-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="list-group-item-heading"><?=$u['name']?> </h4>
                                </div>
                                <div class="col-md-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <i class="fa fa-pencil edit fn" data-title="Editando usuário..." data-id="<?=$u['id']?>" data-url="user/edit" data-toggle="modal" data-target="#modalUsers"></i>
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fa fa-trash-o trash fn" data-title="Apagando usuário..." data-url="user/delete" data-id="<?=$u['id']?>" data-toggle="modal" data-target="#modalUsers"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
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




<script>
    $(function(){
        $("#formCreateUser").on("submit",function(){
            event.preventDefault();
            var data = $( this ).serialize();

            var pass = $("#pass");
            var pass2 = $("#pass2");


            if((pass.val() != pass2.val())){
                console.log(data);
            }else{
                $.ajax({
                    type: 'post',
                    url: '<?=$actions->baseUrlAjax()?>user/create',
                    data: data,
                    datatype: 'json',
                    success: function(t){
                        notification.ok('Enviado com Sucesso!!');
                    },
                    error: function(){
                        notification.ok('Error ao salvar o usuário!!');
                    }
                });
            }
        });



        $("#formEditUser").on("submit",function(){
            event.preventDefault();
            var url = $(".editForm").data('url');
            console.log('<?=$actions->baseUrlAjax()?>'+url);

            $.ajax({
                url: '<?=$actions->baseUrlAjax()?>'+url,
                type: 'post',
                data: $(this).serialize(),
                datatype: 'html',
                beforeSend: function(){
                    $('.progress-bar').show();
                },
                complete: function() {
                    $('.progress-bar').fadeOut();
                },
                success: function(e){
                    window.location.reload();
                }
            });
        });






        // ajax of actions

        $(".fn").on("click", function(){
            var url = $(this).data('url');
            var title = $(this).data('title');
            var id = $(this).data('id');


            $.ajax({
                url: '<?=$actions->baseUrlAjax()?>'+url,
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
                    $('#modalUses').modal('show');
                }
            });
        });
    });
</script>

<?php
$file->includeModel("widgets/rodape.php");
?>
