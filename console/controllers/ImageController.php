<?php
namespace console\controllers;

use yii\console\Controller;
use yii\console\widgets\Table;
use yii\helpers\Json;

use Yii;

class ImageController extends Controller
{
    public $keyword;

    public function actionSearch(){
        $images = Json::decode(Yii::$app->unsplash->get(
            'search/photos',
            [
                'client_id'=> 'rqJI_ddhGxQSsrCYc9ex6wB7oKg3Smccfm5zgMTPMF4',
                'query' => $this->keyword,
                'page' => 1,
                'per_page' => 20
            ]
        )->send()->content);
        $rows=[];
        foreach ($images['results'] as $image){
            array_push($rows,[$image['id'],$image['alt_description'],$image['urls']['raw']]);
        }
        echo Table::widget([
            'headers' => ['id','description','url'],
            'rows' => $rows
        ]);
    }

    public function optionAliases()
    {
        return ['q' => 'keyword'];
    }

    public function options($actionID)
    {
        return ['keyword'];
    }
}