<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "owners".
 *
 * @property int $id Идентификатор
 * @property int $reestr_id Идентификатор реестра
 * @property int $user_id Идентификатор пользователя
 * @property double $ownership_share Доля собственности
 * @property string $psprt_series Серия паспорта
 * @property string $psprt_given_by Кем выдан паспорт
 * @property string $phone Номер телефона
 * @property string $email Электронная почта
 * @property double $cadastral_square Кадастровая площадь
 * @property string $cadastral_number Кадастровый номер
 *
 * @property Reestr $reestr
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
            [['reestr_id', 'user_id'], 'integer'],
            [['ownership_share', 'cadastral_square'], 'number'],
            [['psprt_series', 'psprt_given_by', 'phone', 'email', 'cadastral_number'], 'string', 'max' => 255],
            [['reestr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reestr::className(), 'targetAttribute' => ['reestr_id' => 'id']],
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
            'reestr_id' => 'Reestr ID',
            'user_id' => 'User ID',
            'ownership_share' => 'Ownership Share',
            'psprt_series' => 'Psprt Series',
            'psprt_given_by' => 'Psprt Given By',
            'phone' => 'Phone',
            'email' => 'Email',
            'cadastral_square' => 'Cadastral Square',
            'cadastral_number' => 'Cadastral Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReestr()
    {
        return $this->hasOne(Reestr::className(), ['id' => 'reestr_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
