<?php
//use yii\helpers\Html;
//use yii\bootstrap4\ActiveForm;
//use yii\widgets\LinkPager;
use yii\widgets\DetailView;
///* @var $this yii\web\View */
///* @var $form yii\widgets\ActiveForm */
///* @var $model app\models\LoginForm */


$this->title = 'text';
$this->params['breadcrumbs'][] = $this->title;
echo DetailView::widget([
    'model'=>$model,
    'attributes'=> [
        'id',
        'NameArticle',
        'text',
    ]
]);
















