<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%images}}".
 *
 * @property int $id
 * @property string $url
 * @property int|null $collection
 *
 * @property Collections $collection0
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%images}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url'], 'string'],
            [['collection'], 'default', 'value' => null],
            [['collection'], 'integer'],
            [['collection'], 'exist', 'skipOnError' => true, 'targetClass' => Collection::className(), 'targetAttribute' => ['collection' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'collection' => 'Collection',
        ];
    }

    /**
     * Gets query for [[Collection0]].
     *
     * @return \yii\db\ActiveQuery|CollectionsQuery
     */
    public function getCollection0()
    {
        return $this->hasOne(Collection::className(), ['id' => 'collection']);
    }

    /**
     * {@inheritdoc}
     * @return ImagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImagesQuery(get_called_class());
    }
}
