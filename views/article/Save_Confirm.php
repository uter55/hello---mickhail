<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<p>Ваш текст успешно сохранен</p>

<ul>
    <li><label>NameArticle</label>: <?= Html::encode($model->NameArticle) ?></li>
<li><label>text</label>: <?= Html::encode($model->text) ?></li>
</ul>
<a href="<?= Url::to(['article/showdb']);?> "> зарегистрированные участники </a>
<?php
?>

