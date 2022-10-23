<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;



$form = ActiveForm::begin();?>
<?$form-> field( $model, 'NameArticle');?>
<?$form->field($model, 'text');?>
<?ActiveForm::end();?>