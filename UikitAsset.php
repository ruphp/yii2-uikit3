<?php

namespace ruwmapps\yii2_uikit3;

use yii\web\AssetBundle;


class UikitAsset extends AssetBundle
{
    public $sourcePath = '@ruwmapps/yii2_uikit3/uikit';

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