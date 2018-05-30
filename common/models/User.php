<?php
namespace common\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'username'          => \Yii::t('user', 'Username'),
            'first_name'          => \Yii::t('user', 'First name'),
            'last_name'          => \Yii::t('user', 'Last name'),            
            'email'             => \Yii::t('user', 'Email'),
            'registration_ip'   => \Yii::t('user', 'Registration ip'),
            'unconfirmed_email' => \Yii::t('user', 'New email'),
            'password'          => \Yii::t('user', 'Password'),
            'created_at'        => \Yii::t('user', 'Registration time'),
            'last_login_at'     => \Yii::t('user', 'Last login'),
            'confirmed_at'      => \Yii::t('user', 'Confirmation time'),
        ];
    }
    
    /** @inheritdoc */
    public function rules()
    {
        return [
            // username rules
            'usernameTrim'     => ['username', 'trim'],
            'usernameRequired' => ['username', 'required', 'on' => ['register', 'create', 'connect', 'update']],
            'usernameMatch'    => ['username', 'match', 'pattern' => static::$usernameRegexp],
            'usernameLength'   => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernameUnique'   => [
                'username',
                'unique',
                'message' => \Yii::t('user', 'This username has already been taken')
            ],

            // email rules
            'emailTrim'     => ['email', 'trim'],
            'emailRequired' => ['email', 'required', 'on' => ['register', 'connect', 'create', 'update']],
            'emailPattern'  => ['email', 'email'],
            'emailLength'   => ['email', 'string', 'max' => 255],
            'emailUnique'   => [
                'email',
                'unique',
                'message' => \Yii::t('user', 'This email address has already been taken')
            ],

            // password rules
            'passwordRequired' => ['password', 'required', 'on' => ['register']],
            'passwordLength'   => ['password', 'string', 'min' => 6, 'max' => 72, 'on' => ['register', 'create']],
            
            // name rules
            'first_nameTrim'     => ['first_name', 'trim'],
            'first_nameLength'   => ['first_name', 'string', 'min' => 3, 'max' => 255],
            'last_nameTrim'      => ['last_name', 'trim'],
            'last_nameLength'    => ['last_name', 'string', 'min' => 3, 'max' => 255],            
            
        ];
    }    
}