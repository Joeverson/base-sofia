<?php
include "models/widgets/topo.php";
include "models/widgets/menu.php";
?>
<section class="container sbr clearfix">
        <section id="content">
            <article class="post-item clearfix">
                <a href="single-post.html">
                    <h3 class="title">
                        Suspendisse potenti  nullam consectetur, metus vestibulum urna ipsum fringilla velit felis vitae ante.
                    </h3>
                </a>
                <a class="single-image" href="images/gallery/fullscreen/04.jpg">
                    <img class="custom-frame" alt="" src="<?= $base_url ?>/models/includes/images/blog/post-1.jpg">
                </a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing tincidunt malesuada. Aenean metus lorem, lacinia est.
                    Maecenas sit amet magna eget rhoncus imperdiet. Quisque consectetur lacinia felis, posumassa fermentum vel.
                    Morbi metus nibh, tincidunt ac luctus hendrerit, iaculis sed velit.
                </p>
            </article>
</section>
<aside id="sidebar">
    <?php
    include "models/widgets/facebook.php";
    ?>
</aside><!--/ #sidebar-->

<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->

</section><!--/.container -->


    <!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->
<?php
include "models/widgets/rodape.php";
?>