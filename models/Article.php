<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $NameArticle
 * @property string $text
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @property string $author
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NameArticle', 'text', 'author'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['NameArticle'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 8000],
            [['author'],  'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'NameArticle' => Yii::t('app', 'Name Article'),
            'text' => Yii::t('app', 'Text'),
            'createdAt' => Yii::t('app', 'Created At'),
            'updatedAt' => Yii::t('app', 'Updated At'),
            'author' => Yii::t('app', 'Author'),
        ];
    }
}
