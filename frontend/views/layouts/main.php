<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="app">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/donedeal.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Html::img('@web/images/header_logo.png', ['alt'=>Yii::$app->name]),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top donedeal-nav',
                ],
            ]);
            $menuItems = [

            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] =  Html::button('Login',['value' => Url::to(['/site/login']),'class'=>'btn btn-primary btn-sm','id' => 'signinmodalButton','data-toggle' =>'tooltip','title' => 'Login' ]);
                $menuItems[] = Html::button('Register',['value' => Url::to(['/site/signup']),'class'=>'btn btn-primary btn-sm','id' => 'signupmodalButton','data-toggle' =>'tooltip','title' => 'Login' ]);
            } else {
                $menuItems[] = ['label' => 'My Account', 'url' => ['/user/dashboard']];
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->email . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];

            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>
<!--        Let us add the second nav bar that is going to contain the categories-->


        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; DoneDeal <?= date('Y') ?></p>
        <p class="pull-right">The Best Deals In Town </p>
        </div>
    </footer>
    <?php
    Modal::begin([
        'id' => 'signupModal',
    ]);
    echo "<div id = 'signupModalContent'></div>";
    Modal::end();
    ?>
    <?php
    Modal::begin([
        'id' => 'signinModal',
    ]);
    echo "<div id = 'signinModalContent'></div>";
    Modal::end();
    ?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
