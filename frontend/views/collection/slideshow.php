<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use frontend\assets\CollectionSlideshowAsset;
use yii\web\View;

$this->title = 'Collection Slideshow';
$this->params['breadcrumbs'][] = $this->title;
CollectionSlideshowAsset::register($this);
$options = [
    'images' => $images,
];
$this->registerJs(
    "var images = ".\yii\helpers\Json::htmlEncode($options).";",
    View::POS_HEAD,
    'images'
);
?>

<div id="slideshow-container" class="slideshow-container">
    <div id="slides-collection"></div>
    <div class="navigation">
        <button id="prev-btn" class="prev-btn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button id="next-btn" class="next-btn">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    <div id="position-indicators" class="position-indicators"></div>
</div>