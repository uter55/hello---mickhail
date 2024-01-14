<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class   UserSearch extends Model
{
    public $id;
    public $username;
    public $email;
    public $position;
    public $password;
    public $role;
    public $date_from;
    public $date_to;
    public $created_at;


    public static function tableName()
    {
        return 'user';
    }
    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username', 'password', 'role','email'], 'safe'],
            [['date_from', 'date_to'], 'date', 'format' => 'Y-m-d H:i:s'],
//          [['createdAt', 'updatedAt'], 'date', 'format' => 'php:Y-m-d H:i'],
//          [['created_at'],'date', 'format' => 'Y-m-d H:i:s'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'этот email адресс уже занят'],

        ];
    }

//    /**
//     * {@inheritdoc}
//     */
//    public function scenarios()
//    {
//        // bypass scenarios() implementation in the parent class
//        return Model::scenarios();
//    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'updated_at' => Yii::t('app', 'USER_UPDATED'),
            'username' => Yii::t('app', 'USER_USERNAME'),
            'email' => Yii::t('app', 'USER_EMAIL'),
            'status' => Yii::t('app', 'USER_STATUS'),
            'date_from' => Yii::t('app', 'USER_DATE_FROM'),
            'date_to' => Yii::t('app', 'USER_DATE_TO'),
            'created_at'=> Yii::t('app','111'),

        ];
    }
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = User::find();
        $dateFrom = isset($params['UserSearch']['date_from'])?$params['UserSearch']['date_from']  : null;
        $dateTo = isset($params['UserSearch']['date_to'])?$params['UserSearch']['date_to']  : null;
        // add conditions that should always apply here
//echo '<pre>';
//        var_dump( $dateFrom);
//        var_dump($dateTo);
//die();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

        $this->load($params);



        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'position'=> $this->position,
            'email'=> $this ->email,
        ]);

        $query
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like','position', $this->position])
            ->andFilterWhere(['>=', 'created_at', $dateFrom ])
            ->andFilterWhere(['<=', 'created_at', $dateTo ]);
//        echo '<pre>';
//        var_dump( strtotime($dateFrom  ));
//        die();
        return $dataProvider;
    }

}
