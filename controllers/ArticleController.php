<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\ArticleForm;
use app\models\Article;

class ArticleController extends Controller{

public function actionArticle () {
    $model = new ArticleForm ();

}

}
