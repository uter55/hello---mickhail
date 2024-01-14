<?php

use app\models\LoginForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
?>
    <h1><?= \yii\bootstrap4\Html::encode($this->title) ?></h1>
<?php

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin() ?>

<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end();
 ?>
<?//=$currentUrl = Url::to('', true);?>
