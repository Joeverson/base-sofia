<?php
$file->includeModel("widgets/topo.php");
$file->includeModel("widgets/sidebar.php");
//include "../widgets/topo.php";
?>
    <body>
<div id="wrapper">
    <div class="overlay"></div>
    <?php $file->includeModel("widgets/menu.php"); ?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>

        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    criar
                </div>
            </div>
        </div>

    </div>

</div>

<?php

$file->includeModel("widgets/rodape.php");
?>