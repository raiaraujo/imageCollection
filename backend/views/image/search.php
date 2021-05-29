<?php

use backend\assets\ImageGaleryAsset;
use yii\bootstrap4\LinkPager;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

ImageGaleryAsset::register($this);
$this->title = 'Images Search';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="input-group">
    <form class="form-inline my-2 my-lg-0" action="<?php echo Url::to(['image/search']);?>">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>


<?php if(!empty($images)):?>
<div class="gallery-container">
<?php foreach ($images as $image): ?>
    <div class="gallery-item">
        <div class="gallery-image">
            <div class="image">
                <img src=<?= $image['urls']['thumb'] ?>>
            </div>
        </div>
        <a href="<?php echo Url::to(['image/set-user/','id'=>$image['id']])?>">
            <button type="button" class="mt-1 btn btn-primary btn-block">
                Add to collection
            </button>
        </a>
    </div>
        <?php endforeach;?>
    </div>
    <?php
    echo LinkPager::widget([
        'pagination' => $totalPages,
    ]);
else:?>
<div class="d-flex flex-column justify-content-center align-items-center">
    <i class="fas fa-search-minus"></i>
    No results found
</div>
<?php endif;
?>
