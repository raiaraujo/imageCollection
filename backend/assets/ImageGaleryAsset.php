<?php
namespace backend\assets;

use yii\web\AssetBundle;

class ImageGaleryAsset extends AssetBundle
{
    public $basePath = '@webroot/imagegalery';
    public $baseUrl = '@web/imagegalery';
    public $css = [
        'image-galery.css'
    ];
}