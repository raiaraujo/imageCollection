<?php
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images Search';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="d-flex flex-column justify-content-center align-items-center">

    <div class="img-box">
        <img src="<?php echo $image['urls']['small'] ?>" class="img-responsive">
        <?php $form = ActiveForm::begin();?>
            <?= $form->field($model, 'url')->hiddenInput(['value'=> $image['urls']['raw']])->label(false);?>
            <?= $form->field($model, 'collection')->dropDownList($collections, ['prompt' => 'Select the collection' ]); ?>
        <div class="form-group">

            <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>