<?php
namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class CollectionSlideshowAsset extends AssetBundle
{
    public $basePath = '@webroot/slideshow';
    public $baseUrl = '@web/slideshow';
    public $css = [
        'slideshow.css'
    ];

    public $js = [
        'slideshow.js'
    ];

    public $depends = [
        JqueryAsset::class
    ];
}