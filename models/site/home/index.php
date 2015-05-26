<?php
include "models/site/widgets/topo.php";
include "models/site/widgets/menu.php";
?>
    <!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->

    <section class="container sbr clearfix">

        <?php include "models/site/home/slider.php";        ?>

        <ul class="block-with-icons clearfix">
            <li class="b1">
                <a href="#">
                    <h5>Transparência</h5>
                    <span>Acesse o portal da transparência.</span>
                </a>
            </li>
            <li class="b2">
                <a href="#">
                    <h5>accessibility</h5>
                    <span>Adipiscing tincidunt malesuada.</span>
                </a>
            </li>
            <li class="b3">
                <a href="#">
                    <h5>calendar</h5>
                    <span>Adipiscing tincidunt malesuada.</span>
                </a>
            </li>
        </ul><!--/ .block-with-icons-->

        <!-- - - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

        <section id="content">

            <article class="post-item clearfix">

                <a href="single-post.html">
                    <h3 class="title">
                        Suspendisse potenti  nullam consectetur, metus vestibulum urna ipsum fringilla velit felis vitae ante.
                    </h3><!--/ .title -->
                </a>

                <section class="post-meta clearfix">

                    <div class="post-date"><a href="#">June 15, 2012</a></div><!--/ .post-date-->
                    <div class="post-tags">
                        <a href="#">News</a>
                        <a href="#">Events</a>
                        <a href="#">People</a>
                    </div><!--/ .post-tags-->

                </section><!--/ .post-meta-->

                <a class="single-image" href="#">
                    <img class="custom-frame" alt="" src="<?= $actions->sitePath() ?>/includes/images/blog/post-1.jpg">
                </a>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing tincidunt malesuada. Aenean metus lorem, lacinia est.
                    Maecenas sit amet magna eget rhoncus imperdiet. Quisque consectetur lacinia felis, posumassa fermentum vel.
                    Morbi metus nibh, tincidunt ac luctus hendrerit, iaculis sed velit.
                </p>

                <a href="single-post.html" class="button gray">Read More &rarr;</a>

            </article><!--/ .post-item-->

            <article class="post-item clearfix">

                <a href="single-post.html">
                    <h3 class="title">Potenti  nullam consectetur urna ipsum</h3><!--/ .title -->
                </a>

                <section class="post-meta clearfix">

                    <div class="post-date"><a href="#">June 15, 2012</a></div><!--/ .post-date-->
                    <div class="post-tags">
                        <a href="#">News</a>
                    </div><!--/ .post-tags-->


                </section><!--/ .post-meta-->

                <a class="single-image" href="images/gallery/fullscreen/02.jpg">
                    <img class="custom-frame" alt="" src="<?= $actions->sitePath(); ?>/includes/images/blog/post-2.jpg">
                </a>

                <p>
                    Lorem ipsum dolor amet, consectetur adipidunt malesuada. Aenean metus lorem, cus imperdiet.
                    Quisque consectetur lacinia felis.
                </p>

                <a href="single-post.html" class="button gray">Read More &rarr;</a>

            </article><!--/ .post-item-->

            <article class="post-item clearfix">

                <a href="single-post.html">
                    <h3 class="title">Nullam quis risus eget urna mollis ornare vel</h3><!--/ .title -->
                </a>

                <section class="post-meta clearfix">

                    <div class="post-date"><a href="#">June 15, 2012</a></div><!--/ .post-date-->
                    <div class="post-tags">
                        <a href="#">News</a>
                    </div><!--/ .post-tags-->


                </section><!--/ .post-meta-->

                <a class="single-image" href="images/gallery/fullscreen/05.jpg">
                    <img class="custom-frame" alt="" src="<?= $actions->sitePath() ?>/includes/images/blog/post-3.jpg">
                </a>

                <p>
                    Lorem ipsum dolor amet, consectetur adipidunt malesuada. Aenean metus lorem, cus imperdiet.
                    Quisque consectetur lacinia felis.
                </p>

                <a href="single-post.html" class="button gray">Read More &rarr;</a>

            </article><!--/ .post-item-->

            <article class="post-item clearfix">

                <a href="single-post.html">
                    <h3 class="title">Potenti  nullam consectetur urna ipsum fringilla</h3><!--/ .title -->
                </a>

                <section class="post-meta clearfix">

                    <div class="post-date"><a href="#">June 15, 2012</a></div><!--/ .post-date-->
                    <div class="post-tags">
                        <a href="#">News</a>
                    </div><!--/ .post-tags-->


                </section><!--/ .post-meta-->

                <a class="single-image" href="images/gallery/fullscreen/06.jpg">
                    <img class="custom-frame" alt="" src="<?= $actions->sitePath() ?>/includes/images/blog/post-4.jpg">
                </a>

                <p>
                    Lorem ipsum dolor amet, consectetur adipidunt malesuada. Aenean metus lorem, cus imperdiet.
                    Quisque consectetur lacinia felis.
                </p>

                <a href="single-post.html" class="button gray">Read More &rarr;</a>

            </article><!--/ .post-item-->

            <article class="post-item clearfix">

                <a href="single-post.html">
                    <h3 class="title">How to use Quick Donate nullam consectetur</h3><!--/ .title -->
                </a>

                <section class="post-meta clearfix">

                    <div class="post-date"><a href="#">June 15, 2012</a></div><!--/ .post-date-->
                    <div class="post-tags">
                        <a href="#">News</a>
                    </div><!--/ .post-tags-->


                </section><!--/ .post-meta-->

                <a class="single-image" href="images/gallery/fullscreen/03.jpg">
                    <img class="custom-frame" alt="" src="<?= $actions->sitePath() ?>/includes/images/blog/post-5.jpg">
                </a>

                <p>
                    Lorem ipsum dolor amet, consectetur adipidunt malesuada. Aenean metus lorem, cus imperdiet.
                    Quisque consectetur lacinia felis.
                </p>

                <a href="single-post.html" class="button gray">Read More &rarr;</a>
            </article>
        </section>
        <aside id="sidebar">
            <?php
            include "models/site/widgets/eventos.php";
            ?>
        </aside>
    </section>

    <!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->
<?php
include "models/site/widgets/rodape.php";
?>