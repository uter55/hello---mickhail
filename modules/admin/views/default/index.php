
<?php
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\DefaultController;


$this->title = Yii::t('app', 'Admin');
$this->params['breadcrumbs'][] = $this->title;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ADMIN'), 'url' => ['/admin/default/index']];
?>

<?=\yii\bootstrap4\Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'activateParents' => true,
        'items' => array_filter([
            ['label' => Yii::t('app', 'NAV_HOME'), 'url' => ['/main/default/index']],
            ['label' => Yii::t('app', 'Admin_users'), 'url' => ['users/index']],
            Yii::$app->user->isGuest ?
                ['label' => Yii::t('app', 'NAV_SIGNUP'), 'url' => ['/user/default/signup']] :
                false,
            Yii::$app->user->isGuest ?
                ['label' => Yii::t('app', 'NAV_LOGIN'), 'url' => ['/user/default/login']] :
                false,
            !Yii::$app->user->isGuest ?
                ['label' => Yii::t('app', 'NAV_ADMIN'), 'items' => [
                    ['label' => Yii::t('app', 'NAV_ADMIN'), 'url' => ['/admin/default/index']],
                    ['label' => Yii::t('app', 'ADMIN_USERS'), 'url' => ['/admin/users/index']],
                ]] :
                false,
            !Yii::$app->user->isGuest ?
                ['label' => Yii::t('app', 'NAV_PROFILE'), 'items' => [
                    ['label' => Yii::t('app', 'NAV_PROFILE'), 'url' => ['/user/profile/index']],
                    ['label' => Yii::t('app', 'NAV_LOGOUT'),
                        'url' => ['/user/default/logout'],
                        'linkOptions' => ['data-method' => 'post']]
                ]] :
                false,
        ]),
    ]);


?>





    <!--    <h1>--><?//= $this->context->action->uniqueId ?><!--</h1>-->
<!--    <p>-->
<!--        -->
<!--    </p>-->
<!--    <p>-->
<!--        You may customize this page by editing the following file:<br>-->
<!--        <code>--><?//= __FILE__ ?><!--</code>-->
<!--    </p>-->
<!--</div>-->
