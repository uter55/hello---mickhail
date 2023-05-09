<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var   yii\widgets\ActiveForm $model */

$this->title = 'Edit';
$this->params['breadcrumbs'][] = $this->title;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'NameArticle') ?>
<?= $form->field($model, 'text')->passwordInput() ?>


        <?= Html::submitButton(' схранить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end() ?>

























