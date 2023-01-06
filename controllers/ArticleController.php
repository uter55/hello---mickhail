<?php
namespace app\controllers;

use yii\web\Controller;

use app\models\Article;
use yii\data\Pagination;


class ArticleController extends Controller{

public function actionArticle () {

    $model = new Article ();
    $model->load(\Yii::$app->request->post())&&$model->validate();
    if ($model->save()) {
        return $this->render('Save_Confirm', compact('model'));
    }else{
       echo " Данные не сохранились";
    }


    return $this->render('article',['model'=> $model]);

}
public function actionShowdb (){

 $query = Article::find();
    $countQuery = clone $query;
    $pages = new Pagination(['defaultPageSize' => 5,'totalCount' => $countQuery->count()]);
    $models = $query->orderBy('id')->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

    return $this->render('showdb', [
         'models' => $models,
         'pages' => $pages,
    ]);


}
}
