<?
//este widget deve ser usado somente dentro de uma notícia
include "models/admin/articles/models/db.articles.php";
$dbArticles = new DBArticles();
$noticias = $dbArticles->catchSameCategory($id, "limit 5");
?>
<div class="widget-container eventsListWidget">
    <h2 class="widget-title"><b>Veja também</b></h2>

    <ul>
        <?php
            foreach ($noticias as $noticia){
                if ($noticia['id'] == $id) continue;
        ?>
        <li>
            <a href="<?= $actions->siteUrl() ?>noticia/<?= $noticia['id']."/".$actions->linkTitle($noticia['title']) ?>"><h6><?= $noticia['title'] ?></h6></a>
            <span class="widget-date"><?= $noticia['subtitle'] ?></span>

        </li>
        <?php } ?>
    </ul>
</div><!--/ .widget-container-->
