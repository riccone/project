<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property string $name
 *
 * @property Plots[] $plots
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlots()
    {
        return $this->hasMany(Plots::className(), ['region_id' => 'id']);
    }
}
