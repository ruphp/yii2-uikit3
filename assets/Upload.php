<?php

namespace ruwmapps\yii2_uikit3\assets;

use yii\web\AssetBundle;

class Upload extends AssetBundle
{
    public $sourcePath = '@ruwmapps/yii2_uikit3/uikit';

    public $css = [];

    public $js = [];

    public $depends = [
        'ruwmapps\yii2_uikit3\UikitAsset',
    ];
}