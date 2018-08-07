<?php

namespace ruphp\uikit;

use yii\web\AssetBundle;


class UikitAsset extends AssetBundle
{
    public $sourcePath = '@ruphp/uikit/uikit';

    public $css = [
        'css/uikit.min.css',
    ];

    public $js = [
        'js/uikit.min.js',
        'js/uikit-icons.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

}