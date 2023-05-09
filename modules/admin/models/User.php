<?php
namespace app\modules\admin\models;

use yii\helpers\ArrayHelper;
use Yii;


class User extends \app\models\User
{
    const SCENARIO_ADMIN_CREATE = 'adminCreate';
    const SCENARIO_ADMIN_UPDATE = 'adminUpdate';

    public $created_at;
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
            [['username','password','role', 'created_at'], 'string'],
            [['position'],'integer'],
//            [['created_at'], 'date', 'format' => 'y-m-d H:i'],
                    ]);
    }
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
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (!empty($this->newPassword)) {
                $this->setPassword($this->newPassword);
            }
            return true;
        }
        return false;
    }
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
