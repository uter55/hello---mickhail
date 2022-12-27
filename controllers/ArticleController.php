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

//    echo '<pre>';
//   var_dump($model);
//    var_dump(\Yii::$app->request->get('param'));
//    die();
    return $this->render('article',['model'=> $model]);

}
public function actionShowdb (){
//    $querty = Article::find();
////        ->asArray()
////        ->all();
//
////   var_dump($querty);
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

//    return $this->render('showdb',['querty'=>$querty]);
}
}
