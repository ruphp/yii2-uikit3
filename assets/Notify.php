<?php

namespace ruphp\yii2_uikit3\assets;

use yii\web\AssetBundle;

class Notify extends AssetBundle
{
    public $sourcePath = '@ruphp/yii2_uikit3/uikit';

    public $css = [];

    public $js = [];

    public $depends = [
        'ruphp\yii2_uikit3\UikitAsset',
    ];
}