<?php
$file->includeModel("widgets/topo.php");
$file->includeModel("widgets/sidebar.php");
$userData =  $_SESSION['user'];
?>
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="col-md-12">
                        <h4>Olá, <?=$userData['name']?> tudo bem? O que vamos fazer hoje?</h4>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-warning alert-dismissable">
                        <h4>Noticias</h4>
                        <p>É bem simples adicionar novas noticias, basta clicar aqui em baixo.</p>
                        <p><a class="btn btn-warning" href="/cms/admin/articles">Criar novas notícias</a></p>
                    </div>
                    <div class="alert alert-info">
                        <h4>Usuarios</h4>
                        <p>veja quais usuarios existe, ou até então crie novos usuarios para acessar o sistema..</p>
                        <p><a class="btn btn-primary" href="/cms/admin/user/create">Ir para usuários</a></p>
                    </div>
                </div>

            </div>
       </div>
<?php
$file->includeModel("widgets/rodape.php");
?>