<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leads".
 *
 * @property int $id
 * @property string $email
 * @property string $fullname
 * @property string $phone
 */
class Leads extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leads';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'fullname', 'phone'], 'required'],
            [['email', 'fullname', 'phone'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['fullname'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'fullname' => 'Fullname',
            'phone' => 'Phone',
        ];
    }
}
