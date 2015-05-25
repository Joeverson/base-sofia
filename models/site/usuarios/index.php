<?php

$control = new Control();
$control->_FILE()->includeModel("widgets/topo.php");
$control->_FILE()->includeModel("widgets/sidebar.php");
//include "../widgets/topo.php";
?>
<body>
    <div id="wrapper">
        <div class="overlay"></div>
        <?php $control->_FILE()->includeModel("widgets/menu.php"); ?>


        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>

                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>

        </div>

    </div>

<?php
$control->_FILE()->includeModel("widgets/rodape.php")
?>