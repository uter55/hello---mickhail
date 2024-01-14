<?php

namespace app\modules\admin;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'actions' => ['*'],
//                        'roles' => ['admin'],
//                    ]
//                ],
//            ],
//        ];
//    }
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if (!\Yii::$app->user->can('admin'))
        {
////            $this->redirect("/basic/web/index.php/site/index");
            return \Yii::$app->response->redirect('/basic/web/index.php/site/index');
        }

        // custom initialization code goes here
    }
}
