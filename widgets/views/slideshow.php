<?php

use yii\helpers\Html;

\ruphp\yii2_uikit3\assets\Slideshow::register($this);

	$ukSlideshow = $this->context->ukSlideshow;
	$downLi = $this->context->downLi;

?>
<div uk-slideshow='<?=$ukSlideshow?>'>

    <div class="uk-position-relative uk-visible-toggle uk-light">

        <ul class="uk-slideshow-items">
            <?php foreach ($items as $key => $item): ?>
                <li>
                    <?php if (!empty($item['img'])): ?>
                        <?php echo Html::img($item['img'],['uk-cover'=> ''])?>
                    <?php endif ?>
                    <?php if (!empty($item['overlay'])): ?>
                        <div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"><?php echo $item['overlay']?></div>
                    <?php endif ?>
                    <?php if (!empty($item['item'])): ?>
                        <div class="uk-panel"><?=$item['item']?></div>
                    <?php endif ?>
                </li>
            <?php endforeach ?>
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    </div>
    <?php if ($downLi): ?>
        <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin 777"></ul>
    <?php endif ?>
</div>