<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "plots".
 *
 * @property int $id Идентификатор
 * @property string $name Наименование
 * @property int $region_id Идентификатор региона
 *
 * @property Region $region
 * @property Reestr[] $reestrs
 */
class Plots extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plots';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
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
            'region_id' => 'Region ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReestrs()
    {
        return $this->hasMany(Reestr::className(), ['plots_id' => 'id']);
    }
}
