<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
/** @var yii\web\Controller $model */

$this->title = Yii::t('app', 'article');
$this->params['breadcrumbs'][] = $this->title;
$form = ActiveForm::begin();?>
<?=$form->field($model,'NameArticle');?>
<?=$form->field($model, 'text');?>
<?=$form->field($model,'author');?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
