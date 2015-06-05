<?php
include "models/site/widgets/topo.php";
include "models/site/widgets/menu.php";
$qtd = 7; //quantos registros existirão por página

//$limite = (!isset($id) || $id <=0) ? 6 : $qtd.$id-1;
if(!isset($id) || $id <=1){
    $limite = 7;
}else{
    $maximo = $qtd * $id;
    $minimo = $maximo - $qtd;
    $limite = $minimo.",".$maximo;
}
$noticia = $actions->_DB()->getNXFromTable("*, DATE_FORMAT(date_register, '%d-%b-%Y') as data","vnoticias", "date_register", "DESC", $limite);
$proxima = (!isset($id) || $id <=0) ? 1 : $id + 1;

?>

    <section class="container clearfix">
        <div class="page-header">
            <h1 class="page-title">Notícias</h1>
<?php
/////////////////////////////////////////NOTICIA 1
if (isset($noticia[0]) && !empty($noticia[0])) {
    ?>

    <div class="one-third destaque">
        <a class="single-image" href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[0]['id']."/".$actions->linkTitle($noticia[0]['title']) ?>">
            <img class="custom-frame" alt=""
                 src="<?= $actions->sitePath() ?>/includes/images/noticias/<?= $noticia[0]['image'] ?>">
            <span class="curtain">&nbsp;</span>
        </a>
    </div><!--/ .two-thirds-->

    <div class="two-third last">
        <a href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[0]['id']."/".$actions->linkTitle($noticia[0]['title']) ?>">
            <h3 class="title"><?= $noticia[0]['title'] ?></h3><!--/ .title -->
        </a>

        <p>
            <?= $noticia[0]['resume'] ?>
        </p>
        <a href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[0]['id']."/".$actions->linkTitle($noticia[0]['title']) ?>" class="button gray">Leia mais →</a>
    </div><!--/ .one-third .last-->
    <div class="sep"></div>
<?php
}
 /////////////////////////////////////////FIM NOTICIA1

                 for ($a = 1; $a<=2; $a++){
                     if (isset($noticia[$a]) && !empty($noticia[$a])) {
            ?>
                <div class="one-fourth">
                        <a href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[$a]['id']."/".$actions->linkTitle($noticia[$a]['title']) ?>">
                            <h3 class="title"><?= $noticia[$a]['title'] ?></h3><!--/ .title -->
                        </a>
                    <a class="single-image" href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[$a]['id']."/".$actions->linkTitle($noticia[$a]['title']) ?>">
                        <img class="custom-frame" alt="" src="<?= $actions->sitePath() ?>/includes/images/noticias/<?= $noticia[$a]['image'] ?>">
                        <span class="curtain">&nbsp;</span></a>

                    <p>
                        <?= $noticia[$a]['resume'] ?>
                        </p>
                        <a href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[$a]['id']."/".$actions->linkTitle($noticia[$a]['title']) ?>" class="button gray">Leia Mais →</a>
                </div><!--/ .one-fourth-->
            <?php } }
            if (isset($noticia[3]) && !empty($noticia[3])) {
            ?>
        <div class="one-half last">
            <a href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[3]['id']."/".$actions->linkTitle($noticia[3]['title']) ?>">
                <h3 class="title"><?= $noticia[3]['title'] ?></h3><!--/ .title -->
            </a>
            <a class="single-image" href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[3]['id']."/".$actions->linkTitle($noticia[3]['title']) ?>">
                <img class="custom-frame" alt="" src="<?= $actions->sitePath() ?>/includes/images/noticias/<?= $noticia[3]['image'] ?>">
                <span class="curtain">&nbsp;</span></a>
            <p>
                <?= $noticia[3]['resume'] ?>
            </p>
            <a href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[3]['id']."/".$actions->linkTitle($noticia[3]['title']) ?>" class="button gray">Leia Mais →</a>
        </div><!--/ .one-fourth-->
                <div class="sep"></div>
        <?php
         }

        for ($a = 4; $a<=5; $a++){
            if (isset($noticia[$a]) && !empty($noticia[$a])) {
            $texto = $noticia[$a]['resume'];
    ?>
        <div class="one-fourth">
            <a href="<?= $actions->siteUrl() ?>noticia/<?= $noticia[$a]['id']."/".$actions->linkTitle($noticia[$a]['title']) ?>"><h4><?= $noticia[$a]['title']; ?></h4></a>
            <span class="dropcap"><?= substr($texto, 0,1) ?></span>
            <p><?= substr($texto, 1) ?></p>
        </div><!--/ .one-fourth-->
<?php }}
if (isset($noticia[6]) && !empty($noticia[6])) {
    $texto = $noticia[6]['resume'];
    ?>
        <div class="one-half last">
            <a href=<?= $actions->siteUrl() ?>noticia/<?= $noticia[6]['id']."/".$actions->linkTitle($noticia[6]['title']) ?>""><h4><?= $noticia[6]['title']; ?></h4></a>
            <span class="dropcap"><?= substr($texto, 0,1) ?></span>
            <p><?= substr($texto, 1) ?></p>
        </div><!--/ .one-half .last-->
<?php } ?>
        <ul class="pagination aligncenter">
            <?php
            if ($id > 1) echo "<li><a href='".$actions->siteUrl()."noticias/page/".($proxima-2)."'>&larr; Anterior</a></li>";
//<!--            <li><a href="#">1</a></li>-->
//<!--            <li><a class="current" href="#">2</a></li>-->
//<!--            <li><a href="#">3</a></li>-->
            if (count($noticia) == 7) echo "<li><a href='".$actions->siteUrl()."noticias/page/".$proxima."'>Próxima &rarr;</a></li>";
            ?>
        </ul><!--/ .pagination-->
    </section>
<?php
include "models/site/widgets/rodape.php";
?>