<?php

namespace app\controllers;

use app\models\SignupForm;
use app\modules\admin\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Article;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'about', 'contact', 'signup', 'home', 'article'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'about', 'contact', 'home', 'article'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//var_dump(Yii::$app->user->isGuest);
//die();
//            return $this->goBack();
            return $this->redirect('?r=site/contact');
        }
//            if ( Yii::$app->user->isGuest) {
//                return $this->render('/layouts/guest');
//            }


        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();

    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($message = 'Привет')
    {
        return $this->render('say', ['message' => $message]);
    }

    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }

    /**
     * action for signup
     * @return string|Response
     * @throws \yii\base\Exception
     */
    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

            $model = new SignupForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $user = new User();
            $user->username = $model->username;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            $user->position = User::STATUS_ACTIVE;
            $user->created_at = date('Y-m-d h:i:s');
//            echo '<pre>';
//            var_dump($user);
//            die;
//
            if ($user->save()) {
//
//                throw new BadRequestHttpException();
//                echo '<pre>';
//                var_dump($user->getErrors());
//                die();
                return $this->redirect("/basic/web/index.php/site/login");
            }
            $auth = Yii::$app->authManager;
            $authorRole = $auth->getRole('author');
            $auth->assign($authorRole, $user->getId());
//            else {
//                $user->validate();
//            }
//             echo '<pre>';
//                var_dump($user->getErrors());
//                die();
        }

//                echo '<pre>';
//                    var_dump($user->save());
//        die();
        return $this->render('signup', compact('model'));
    }


}