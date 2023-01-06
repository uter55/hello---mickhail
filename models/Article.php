<?php


namespace app\models;


use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property int $id
 * @property string $NameArticle
 * @property string $text
 * @property string|null $createdAt
 * @property string|null $updatedAt
 */

class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NameArticle', 'text'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['NameArticle'], 'string', 'max' => 255],
            [['text'], 'string', 'min'=> 20, 'max' => 8000],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'NameArticle' => 'Name Article',
            'text' => 'Text',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }
}
