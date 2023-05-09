<?php

use yii\widgets\DetailView;

/* @var  $model yii\widgets\DetailView */

$this->title = 'Table';
$this->params['breadcrumbs'][] = $this->title;
echo DetailView::widget([
    'model'=>$model,
    'attributes'=> [
        'id',
        'author',
        'NameArticle',
        'text',

    ]
]);
 