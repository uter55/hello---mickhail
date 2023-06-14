<?php
namespace app\modules\admin\models;

use yii\helpers\ArrayHelper;
use Yii;
use yii\behaviors\TimestampBehavior;

use yii\db\ActiveRecord;

class User extends \app\models\User
{
    const SCENARIO_ADMIN_CREATE = 'adminCreate';
    const SCENARIO_ADMIN_UPDATE = 'adminUpdate';

//    public $created_at;
    public const STATUS_ACTIVE = 1;
    public const STATUS_WAIT = 2;
    public const STATUS_BLOCKED = 3;

    public $newPassword;
    public $newPasswordRepeat;

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['newPassword', 'newPasswordRepeat'], 'required', 'on' => self::SCENARIO_ADMIN_CREATE],
            ['newPassword', 'string', 'min' => 6],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword'],
            [['username','password','role',], 'string'],
            [['position'],'integer'],
//            [['created_at'], 'date', 'format' => 'Y-m-d H:i:s'],
                    ]);
    }
//    public function behaviors()
//    {
//        return [
//            'timestamp' => [
//                'class' => TimestampBehavior::className(),
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
//                ],
//                'value' => function() {
//                    return date('y-m-d H:i', time());
//                },
//            ],
//        ];
//    }
//    public function attributes()
//    {
//        return ArrayHelper::merge(parent::attributes(), [
//            'created_at',
//        ]);
//    }
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_ADMIN_CREATE] = ['username', 'email', 'status', 'newPassword', 'newPasswordRepeat'];
        $scenarios[self::SCENARIO_ADMIN_UPDATE] = ['username', 'email', 'status', 'newPassword', 'newPasswordRepeat'];
        return $scenarios;
    }
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'newPassword' => Yii::t('app', 'USER_NEW_PASSWORD'),
            'newPasswordRepeat' => Yii::t('app', 'USER_REPEAT_PASSWORD'),
            'created_at'=> Yii::t('app','Created'),
        ]);
    }
//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//            if (!empty($this->newPassword)) {
//                $this->setPassword($this->newPassword);
//
//
//            }
//            return true;
//        }
//        return false;
//
//    }
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            Yii::info('New user has been created');
        } else {
            Yii::info('User has been updated');
        }

        if ($this->hasErrors()) {
            Yii::warning('Errors during user save: ' . print_r($this->getErrors(), true));
        }
    }
//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//            if ($this->isNewRecord) {
//                $this->created_at = date('php:Y-m-d H:i', time());
//            }
//            return true;
//        }
//        return false;
//    }
 public static function getStatusesArray (){
        return [
         self::STATUS_ACTIVE => 'Active',
         self::STATUS_WAIT => 'In Progress',
         self::STATUS_BLOCKED => 'Blocked',
     ];
 }
//    public function getStatusName()
//    {
//        $list = self::getStatusesArray();
//        return isset($list[$this->position]) ? $list[$this->position] : 'Unknown';
//
//
//    }



}
