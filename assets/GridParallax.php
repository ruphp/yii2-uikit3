<?php

namespace ruphp\uikit\assets;

use yii\web\AssetBundle;

class GridParallax extends AssetBundle
{
    public $sourcePath = '@ruphp/uikit/uikit';

    public $css = [];

    public $js = [];

    public $depends = [
        'ruphp\uikit\UikitAsset',
    ];
}