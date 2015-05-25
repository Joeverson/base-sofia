<?php
include "models/site/widgets/topo.php";
include "models/site/widgets/menu.php";
?>


<section class="container clearfix">

    <!-- - - - - - - - - - Page Header - - - - - - - - - - -->

    <div class="page-header">

        <h1 class="page-title">Contatos</h1>

    </div>
    <div id="map"></div>
    <div class="one-third">
        <h3>Endereço:</h3>
        <address>
            Endereço: Rua Major Inocêncio, Nº 66, Centro<br/>
            Água Branca - PB<br>
            CEP: 58748-000
        </address>
    </div><!--/ .one-third-->
    <div class="two-third last">
        <div id="contact">
            <script type="text/javascript" src="http://form.jotformz.com/jsform/51275608550657"></script>
        </div><!--/ contact-->

    </div><!--/ .two-third .last-->

</section><!--/.container -->


<?php
include "models/site/widgets/rodape.php";
?>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?= $base_url ?>/models/includes/js/jquery.gmap.min.js"></script>
