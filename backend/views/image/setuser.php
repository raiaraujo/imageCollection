<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">username</th>
            <th scope="col">email</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($model as $user):?>
        <tr>
            <th scope="row"></th>
            <td><?= $user['id']?></td>
            <td><?= $user['username']?></td>
            <td><?= $user['email']?></td>
            <td><?= Html::a('Select User', ['create', 'id' =>$user['id'],'image'=>$image], ['class' => 'btn btn-primary']) ?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</div>
