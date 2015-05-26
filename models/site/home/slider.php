<?php
include_once 'libs/pkw.function.php';
$actions  = new ACTIONS();
?>
<!-- - - - - - - - - - - Slider - - - - - - - - - - - - - -->

<div id="slider" class="flexslider clearfix">

    <ul class="slides">
        <li>
            <img src="<?= $actions->sitePath() ?>includes/images/sliders/slide-1.jpg" alt="" />
            <div class="caption">
                <div class="caption-entry">
                    <div class="caption-title"><h2>Welcome</h2></div>
                    <p>
                        Suspendisse potenti  consectetur, vestibulum urna ipsum fringilla velit felis vitae ante phasellus
                        lectus orci, ultrices porta egestas in, elementum.
                    </p>
                </div><!--/ .caption-entry-->
            </div><!--/ .caption-->
        </li>
        <li>
            <img src="<?= $actions->sitePath() ?>includes/images/sliders/slide-2.jpg" alt="" />
            <div class="caption">
                <div class="caption-entry">
                    <div class="caption-title"><h2>Welcome</h2></div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad.
                    </p>
                </div><!--/ .caption-entry-->
            </div><!--/ .caption-->
        </li>
        <li>
            <img src="<?= $actions->sitePath() ?>includes/images/sliders/slide-3.jpg" alt="" />
            <div class="caption">
                <div class="caption-entry">
                    <div class="caption-title"><h2>Welcome</h2></div>
                    <p>
                        Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod
                        turpis, id tincidunt sapien risus a quam.
                    </p>
                </div><!--/ .caption-entry-->
            </div><!--/ .caption-->
        </li>
        <li>
            <img src="<?= $actions->sitePath() ?>/includes/images/sliders/slide-4.jpg" alt="" />
            <div class="caption">
                <div class="caption-entry">
                    <div class="caption-title"><h2>Welcome</h2></div>
                    <p>
                        Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis,
                        molestie eu, feugiat in, orci risus a guam.
                    </p>
                </div><!--/ .caption-entry-->
            </div><!--/ .caption-->
        </li>
        <li>
            <img src="<?= $actions->sitePath() ?>/includes/images/sliders/slide-5.jpg" alt="" />
            <div class="caption">
                <div class="caption-entry">
                    <div class="caption-title"><h2>Welcome</h2></div>
                    <p>
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in.
                    </p>

                </div><!--/ .caption-entry-->
            </div><!--/ .caption-->
        </li>
    </ul><!--/ .slides-->

</div><!--/ #slider-->