<?php
namespace app\controllers;

use yii\web\Controller;

use app\models\Article;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
class ArticleController extends Controller
{

    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['article', 'showdb', 'text'],
                'rules' => [
                    [
                        'actions' => ['article', 'showdb', 'text'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],];
    }

    public function actionArticle()
    {

        $model = new Article ();
        $model->load(\Yii::$app->request->post()) && $model->validate();
        $model->createdAt = date('y-m-d H:i', time());
        $model->updatedAt = date('y-m-d H:i', time());
        if ($model->save()) {
            return $this->render('Save_Confirm', compact('model'));
        } else {
            echo " Данные не сохранились";
        }


        return $this->render('article', ['model' => $model]);

    }

    public function actionShowdb()
    {

// $query = Article::find();
//    $countQuery = clone $query;
//    $pages = new Pagination(['defaultPageSize' => 5,'totalCount' => $countQuery->count()]);
//    $models = $query->orderBy('id')->offset($pages->offset)
//        ->limit($pages->limit)
//        ->all();
//
//    return $this->render('showdb', [
//         'models' => $models,
//         'pages' => $pages,
//    ]);

//$article = Article::find()->all();
//        return $this->render('showdb', [
//        'article' => $article,
//    ]);
        $dataProvider = new ActiveDataProvider([
            'query' => Article::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('showdb', ['dataProvider' => $dataProvider]);
    }
    public function actionView ($id){
        $model = Article::findOne($id);
        return $this->render('view', [ 'model'=>$model]);
    }
    public function actionUpdate ($id){
        $model = Article::findOne($id);
        return $this->render('edit', [ 'model'=>$model]);
    }

}