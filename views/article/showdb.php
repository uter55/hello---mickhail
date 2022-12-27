<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */


$this->title = 'зарегистрированные пользователи';
?>
<h1><?= Html::encode($this->title) ?></h1>

<?//= Html::encode('querty');?>
    <ul>
    <?php foreach ($models as $model):?>
        <li>
            <?= Html::encode("{$model->NameArticle} {$model->text} ") ?>
        </li>
    <?php endforeach; ?>
    <ul>
<?=LinkPager::widget([
    'pagination' => $pages,
]);?>
