<?php
include "models/site/widgets/topo.php";
include "models/site/widgets/menu.php";
$noticia = $actions->_DB()->getNXWhere("vnoticias", "id = ".$id, "", "ASC", "all", "*, DATE_FORMAT(date_register, '%d-%b-%Y') as data" );
?>
	
	<section class="container sbr clearfix">
		<section id="content">
			<article class="post clearfix">
				<h3 class="title"><?= $noticia[0]['title'] ?></h3>
				<section class="post-meta clearfix">
					<div class="post-date"><?= $noticia[0]['data'] ?></div><!--/ .post-date-->
<!--					<div class="post-tags">-->
<!--						<a href="#">News</a>-->
<!--						<a href="#">Events</a>-->
<!--<!--						<a href="#">People</a>-->
<!--<!--					</div><!--/ .post-tags-->
<!--					<div class="post-comments"><a href="#">5 Comments</a></div><!--/ .post-comments-->
				</section><!--/ .post-meta-->
					<img class="custom-frame" alt="" src="<?= $actions->sitePath() ?>/includes/images/noticias/<?= $noticia[0]['image'] ?>">
				<div id="texto" class="texto"><?= $noticia[0]['text'] ?></div>
			</article><!--/ .post-->
			
			<section id="comments">

                <div class="fb-comments" data-href="http://developers.facebook.com/docs/plugins/comments/" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
			</section>
			
		</section><!--/ #content-->
		
		<!-- - - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - - -->	
		
		
		<!-- - - - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - -->	
		
		<aside id="sidebar">
            <?php
                include "models/site/noticias/widgets/noticiassimilares.php";
            ?>
			
		</aside><!--/ #sidebar-->
	</section><!--/.container -->
		

<?php
include "models/site/widgets/rodape.php";
?>