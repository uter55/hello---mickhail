<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<?php

/** @var app\controllers\ $model */
$this->title = 'Сохранено';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>Ваш текст успешно сохранен</p>

<ul>
    <li><label>NameArticle</label>: <?= Html::encode($model->NameArticle) ?></li>
<li><label>text</label>: <?= Html::encode($model->text) ?></li>
    <li><label>Author</label>: <?= Html::encode($model->author) ?></li>
</ul>
<a href="<?= Url::to(['article/showdb']);?> "> зарегистрированные участники </a>

