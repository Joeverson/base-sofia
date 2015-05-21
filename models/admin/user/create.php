<?php
include "models/widgets/topo.php";
include "models/widgets/sidebar.php";

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
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"  style="width: 20%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="price-body">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" id="name" name="name" value="hy"class="form-control" placeholder="Usuário" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" id="email" name="email" value="hy@oi.com" class="form-control" placeholder="E-mail" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                            <select name="cat" class="form-control">
                                                <option value="-1">Defina os privilegios do usuário</option>
                                                <?php foreach($cat as $c){?>
                                                    <option value="<?=$c["id_tipo"]?>"><?=$c["name_cat"]?></option>
                                                <?}?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="password" id='pass2' value="123" class="form-control" placeholder="Senha" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                            <input type="password" id="pass" name="pass" value="123" class="form-control" placeholder="Re-Senha" required="">
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
                    <?php //foreach($user->selectAllUser() as $u){ ?>
                        <!--a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading"><?//=$u['name']?> <i class="fa fa-pencil edit fn" data-title="Editando usuário..." data-id="<?//=$u['id']?>" data-url="user/edit" data-toggle="modal" data-target="#modalUsers"></i> <i class="fa fa-trash-o trash fn" data-title="Apagando usuário..." data-url="user/d" data-id="<?//=$u['id']?>" data-toggle="modal" data-target=".modalUsers"></i>
                                </h4>
                            <p class="list-group-item-text">Tipo de Usuário: <?//=$u['name_cat']?></p>

                        </a-->
                    <?php //} ?>
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
                    url: '<?=$baseUrlAjax?>user/create',
                    data: data,
                    datatype: 'json',
                    success: function(t){
                        $('body').prepend(t);
                        /*name.val('');
                        email.val('');
                        pass.val('');
                        pass2.val('');*/
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


            var name = $("#name2");
            var pass = $("#pass4");
            var email = $("#email2");
            var id = $("#id").val();
            var cat = $("#cat").val();
            var url = $(".editForm").data('url');
            var str = '';

            if(name.val() != ''){
                str += ":name2="+name.val();
            }

            if(pass.val() != ''){
                str += "&:pass3="+pass.val();
            }
            if(email.val() != ''){
                str += "&:email2="+email.val();
            }

            console.log('<?=$baseUrlAjax?>'+url);
            $.ajax({
                url: '<?=$baseUrlAjax?>'+url,
                type: 'post',
                data: str,
                datatype: 'html',
                beforeSend: function(){
                    $('.progress-bar').show();
                },
                complete: function() {
                    $('.progress-bar').fadeOut();3
                },
                success: function(e){
                    $('body').prepend(e);
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
                    $('#modalUses').modal('show');
                }
            });
        });
    });
</script>

<?php
include "models/widgets/rodape.php";
?>
