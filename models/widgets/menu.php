<?php
$app = new \Slim\Slim();
$base_url = $app->request->getHost()."/cms";
?>
<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                MENU
            </a>
        </li>
        <li>
            <a href="http://<?= $base_url ?>">Início</a>
        </li>

        <hr>
        <li>
            <a href="http://<?= $base_url ?>/usuarios" id="ultimosnoticias" data-toggle="offcanvas">Usuários</a>
        </li>
        <li>
            <a href="#" id="ultimosnoticias" data-link='models/admin/pages/dashboard.html' data-toggle="offcanvas">Configurações</a>
        </li>
        <li>
            <a href="#" id="ultimosnoticias" data-link='models/admin/pages/dashboard.html' data-toggle="offcanvas">Sair</a>
        </li>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->