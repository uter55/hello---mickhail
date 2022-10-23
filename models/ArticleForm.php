<?php

namespace app\models;
use yii\base\Model;
use yii\swiftmailer\Message;

class ArticleForm extends Model {


    public $NameArticle;

    public $text;

    public function rules()
    {
        return [
           [ ['text','NameArticle'], 'required', 'message' => ' Заполните поле'],
            ['text', 'string', 'leight' => [20,8000]],

        ];
    }

}