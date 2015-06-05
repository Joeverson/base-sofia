<?php
include_once 'models/admin/slider/models/slider.db.inc';
$slider = new dbSlider();
?>
<!-- - - - - - - - - - - Slider - - - - - - - - - - - - - -->



<div id="slider" class="flexslider clearfix">

    <ul class="slides">
        <?php foreach($slider->selectAllSlider() as $sld){ ?>
            <li>
                <img src="<?=$actions->sitePath()?>includes/images/sliders/<?=$sld['img']?>" alt="" />
                <div class="caption">
                    <div class="caption-entry">
                        <div class="caption-title"><h2><?=$sld['title']?></h2></div>
                        <p>
                            <?=$sld['text']?>
                        </p>
                    </div><!--/ .caption-entry-->
                </div><!--/ .caption-->
            </li>
        <?php }?>
    </ul><!--/ .slides-->

</div><!--/ #slider-->