<?php

use yii\helpers\Html;

\ruphp\yii2_uikit3\assets\Slideshow::register($this);

	$ukSlideshow = $this->context->ukSlideshow;
	$downLi = $this->context->downLi;
    $classDiv = $this->context->classDiv;


?>
<div uk-slideshow='<?=$ukSlideshow?>'>

    <div class="<?= $classDiv ?>">

        <ul class="uk-slideshow-items">
            <?php foreach ($items as $key => $item): ?>
            <?php $classOver = !empty($item['classOver']) ? $item['classOver'] : 'uk-position-bottom uk-position-medium uk-text-center uk-light' ?>
                <li>
                    <?php if (!empty($item['img'])): ?>
                        <?php echo Html::img($item['img'],['uk-cover'=> ''])?>
                    <?php endif ?>
                    <?php if (!empty($item['overlay'])): ?>
                        <div class="<?= $classOver ?>"><?= $item['overlay']?></div>
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