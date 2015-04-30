<?php
include_once 'libs/pkw.function.php';
$m = new ACTIONS();

?>

<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                MENU
            </a>
        </li>
        <?php foreach($m->makeMenu() as $k){?>
            <li class="title">
                <?=$k['title']?>

            <?php foreach($k['submenu'] as $v){?>
                <li>
                    <a href="#" data-toggle="offcanvas"><?=$v['title']?></a>
                </li>
            <?}?>
                
            </li>
        <?php } ?>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->

