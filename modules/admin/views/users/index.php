<?php

use app\modules\admin\models\Order;
use app\modules\admin\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\admin\Components\ActionColum;
use yii\grid\GridView;
use yii\grid\DataColumn;

//use app\modules\admin\Components\UserStatusColumn;
use app\modules\admin\Components\SetColumn;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $searchModel->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin'), 'url' => ['/admin/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['users/index']];
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            'id',
            'username',
            'email:email',
            'created_at:datetime',
            [
//                'class' => SetColumn::className(),
//                'filter' => User::getStatusesArray(),
                'attribute' => 'position',
                'format' => 'raw',
                'encodeLabel' => false,
                'value' => function ($model, $key, $index, $column) {
                    /** @var User $model */
                    /** @var \yii\grid\DataColumn $column */
                    $value = $model->position;
//                    echo '<pre>';
//                    var_dump($model);
//                    die();
                    switch ($value) {
                        case User::STATUS_ACTIVE:
                            $class = 'success';
                            break;
                        case User::STATUS_WAIT:
                            $class = 'warning';
                            break;
                        case User::STATUS_BLOCKED:
                        default:
                            $class = 'default';
                    };
                    $html = Html::tag('span', isset(User::getStatusesArray()[$value]) ? User::getStatusesArray()[$value]:'' , ['class' => 'label label-' . $class]);
                    return  $html;
                }
            ],

//            [
//                'class' => UserStatusColumn::className(),
//                'filter' => User::getStatusesArray(),
//                'attribute' => 'status',
//            ],
//            [
//                'filter' => Order::getStatusesArray(),
//                'attribute' => 'status',
//                'format' => 'raw',
//
//
//            ],

//
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, User $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],

            [
                'class' => ActionColum::className()
            ],
        ],
    ]);


    ?>


</div>
