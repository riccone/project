<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "owners".
 *
 * @property int $id Идентификатор
 * @property int $user_id Идентификатор пользователя
 * @property double $ownership_share Доля собственности
 * @property string $psprt_series Серия паспорта
 * @property string $psprt_given_by Кем выдан паспорт
 * @property string $phone Номер телефона
 * @property string $email Электронная почта
 * @property double $cadastral_square Кадастровая площадь
 * @property string $cadastral_number Кадастровый номер
 * @property int $plots_id Идентификатор участка
 * @property int $role
 *
 * @property Plots $plots
 * @property Users $user
 */
class Owners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'owners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'plots_id', 'role'], 'integer'],
            [['ownership_share', 'cadastral_square'], 'number'],
            [['psprt_series', 'psprt_given_by', 'phone', 'email', 'cadastral_number'], 'string', 'max' => 255],
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
            'ownership_share' => 'Ownership Share',
            'psprt_series' => 'Psprt Series',
            'psprt_given_by' => 'Psprt Given By',
            'phone' => 'Phone',
            'email' => 'Email',
            'cadastral_square' => 'Cadastral Square',
            'cadastral_number' => 'Cadastral Number',
            'plots_id' => 'Plots ID',
            'role' => 'Role',
        ];
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
