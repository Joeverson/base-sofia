<?php
$file->includeModel("widgets/topo.php");
$file->includeModel("widgets/sidebar.php");
?>

    <div class="row">
            <div class="col-md-12 inside">
                <div class="row">
                    <h2 class="pull-left">Usuários</h2>
                    <a href="#" class="btn btn-info pull-right add_user"><i class="more"></i>Adicionar Usuário</a>

                    <div class="panel panel-primary">
                        <table class="table">
                            <thead class="thead_primary">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ultimo Login</th>
                                <th>Opções</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach($user->selectAllUser() as $u){ ?>
                                <tr>
                                    <td><?=$u['name']?></td>
                                    <td><?=$u['email']?></td>
                                    <td><?=$u['last_login']?></td>
                                    <td> <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Editar</button>
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Mais Opções</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Editar</a></li>
                                                <li><a href="#">Excluir</a></li>
                                            </ul>
                                        </div>&nbsp;
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

            <!--lista de ativos-->
            <div class="col-md-6">

            </div>
        </div>



    <!-- Modal -->
    <div class="modal fade addUsers" id="modalUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Adicionar Usuário</h4>
                </div>
                <form id="formEditUser">
                    <!--body-->
                    <div class="modal-body"></div>
                    <form action="" class="form-control">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Nome">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Senha">
                        </div>
                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-hdd-o"></i> Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('.add_user').click(function(){
            $('.addUsers').modal('show');
        });
    </script>
<?php
$file->includeModel("widgets/rodape.php");

?>