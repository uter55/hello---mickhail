<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\LinkPager;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */
/* @var  $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Статьи';
?>


    <!--<h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<?//= Html::encode('querty');?>
<!--    <ul>-->
<!--    --><?php //foreach ($models as $model):?>
<!--        <li>-->
<!--            --><?//= Html::encode("{$model->NameArticle} {$model->text} ") ?>
<!--        </li>-->
<!--    --><?php //endforeach; ?>
<!--    <ul>-->
<?//=LinkPager::widget([
//    'pagination' => $pages,
//]);?>




<!--<table class = 'table'>-->
<!--    <tr><td> Text </td><td>NameArticle</td> </tr>-->
<?php
//foreach ($article as $articles ) {
//    echo "<tr><td> <a href='index.php?r=article%2Ftext'>{$articles['NameArticle']}</a> </td><td>{$articles['text']}</td> </tr>";
//}
//?>
<!--</table>-->

<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
]);


























