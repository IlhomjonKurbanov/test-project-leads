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
            ['email', 'email','message'=>"The email isn't correct"],
            ['email', 'unique','message'=>'Email already exists!'],    
            ['fullname', 'unique','message'=>'Fullname already exists!'],  
            ['fullname', 'match', 'pattern' => '/[a-z]+/i', 'message' => '{attribute} should only contain latin!'],  
            ['phone', 'unique','message'=>'Phone already exists!'],    
            ['phone', 'match', 'pattern' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => 'Phone number must be in +7(XXX)XXX-XX-XX format'],
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
