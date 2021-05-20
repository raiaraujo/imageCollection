<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%collections}}".
 *
 * @property int $id
 * @property string $name
 * @property int|null $created_by
 * @property int $status
 *
 * @property User $createdBy
 * @property Images[] $images
 */
class Collection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%collections}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_by', 'status'], 'default', 'value' => null],
            [['created_by', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_by' => 'Created By',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery|ImagesQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['collection' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CollectionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CollectionsQuery(get_called_class());
    }
}
