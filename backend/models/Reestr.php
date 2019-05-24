<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reestr".
 *
 * @property int $id Идентификатор
 * @property int $user_id Идентификатор пользователя
 * @property int $plots_id Идентификатор участка
 * @property double $cadastral_square Кадастровая площадь
 * @property string $cadastral_number Кадастровый номер
 * @property string $psprt_series Серия паспорта
 * @property string $psprt_given_by Кем выдан паспорт
 * @property double $ownership_share Доля собственности
 *
 * @property Owners[] $owners
 * @property Plots $plots
 * @property Users $user
 */
class Reestr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reestr';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'plots_id'], 'integer'],
            [['cadastral_square', 'ownership_share'], 'number'],
            [['cadastral_number', 'psprt_series', 'psprt_given_by'], 'string', 'max' => 255],
            [['plots_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plots::className(), 'targetAttribute' => ['plots_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'plots_id' => 'Plots ID',
            'cadastral_square' => 'Cadastral Square',
            'cadastral_number' => 'Cadastral Number',
            'psprt_series' => 'Psprt Series',
            'psprt_given_by' => 'Psprt Given By',
            'ownership_share' => 'Ownership Share',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwners()
    {
        return $this->hasMany(Owners::className(), ['reestr_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlots()
    {
        return $this->hasOne(Plots::className(), ['id' => 'plots_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
