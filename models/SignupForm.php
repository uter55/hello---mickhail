<?php

namespace app\models;
use yii\base\Model;
use yii\swiftmailer\Message;

class SignupForm extends Model
{

    public $username;

    public $password;


    public function rules() {
        return [
            [['username', 'password'], 'required', 'message' => 'Заполните поле'],
            ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
            ['password','string','min' => 6, 'max' => 20, 'message' => 'пароль не можеть быть менее 7-ти символов' ],


//
//            'tooBig' => 'Пароль не может состоять менее чем из 6 - ти символов.', ' tooSmall' => 'Пароль не может привышать 20 -ти знаков'
//            'password' => [['password'], 'string', 'max' => 20, ],
        ];

    }

    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }

}