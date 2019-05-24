<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id Идентификатор
 * @property string $firstname Имя
 * @property string $lastname Фамилия
 * @property string $date_of_birth Дата рождения
 *
 * @property Owners[] $owners
 * @property Reestr[] $reestrs
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_birth'], 'safe'],
            [['firstname', 'lastname'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'date_of_birth' => 'Date Of Birth',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwners()
    {
        return $this->hasMany(Owners::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReestrs()
    {
        return $this->hasMany(Reestr::className(), ['user_id' => 'id']);
    }
}
