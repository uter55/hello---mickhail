<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends Model
{
    public $id;
    public $username;
    public $email;
    public $position;
    public $password;
    public $role;
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
            [['username', 'password', 'role'], 'safe'],
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
            'created_at' => Yii::t('app', 'USER_CREATED'),
            'updated_at' => Yii::t('app', 'USER_UPDATED'),
            'username' => Yii::t('app', 'USER_USERNAME'),
            'email' => Yii::t('app', 'USER_EMAIL'),
            'status' => Yii::t('app', 'USER_STATUS'),
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             $query->where('0=1');

            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'position'=> $this->position,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password]);
//            ->andFilterWhere(['like', 'role', $this->role]);

        return $dataProvider;
    }


}
