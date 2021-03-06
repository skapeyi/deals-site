<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\icons\Icon;
Icon::map($this);

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <nav class="navbar navbar-default navbar-fixed-top" id="main-nav" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle hamburger hamburger-close collapsed" data-target="#example-navbar-default-collapse" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="hamburger-bar"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed" data-target="#example-navbar-default-search" data-toggle="collapse">
                    <span class="sr-only">Toggle Search</span>
                    <i class="icon wb-search" aria-hidden="true"></i>
                </button>

                <?= Html::a(Html::img('@web/images/header_logo.png', ['alt'=>Yii::$app->name]), ['site/index']) ?>

            </div> <!--Navbar-header-->

            <div class="collapse navbar-collapse navbar-collapse-group" id="example-navbar-default-collapse">
                <ul class="nav navbar-toolbar navbar-left navbar-toolbar-left">
                    <li class="navbar-list">
                        <p class="navbar-text" id="phoneandemail"> <?= Icon::show('mobile').'
0200 905030 <br/>' ?> <?= Icon::show('envelope').'help@donedeal.ug <br/>'?></p>

                    </li>
                    <li class="hidden-float navbar-list">
                        <a class="glyphicon glyphicon-search " data-toggle="collapse" href="#example-navbar-default-search" role="button">
                            <span class="sr-only">Toggle Search</span>
                        </a>
                    </li>

                </ul>
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <?php if(Yii::$app->user->isGuest) :?>
                        <li class="navbar-list">
                            <?= Html::a(Icon::show('facebook'), ['site/auth','authclient' =>'facebook']) ?>
                        </li>
                        <li class="navbar-list">
                            <?= Html::a(Icon::show('sign-in').'Login', ['site/login']) ?>
                        </li>
                        <li class="navbar-list">
                            <?= Html::a(Icon::show('pencil').'Sign-up', ['site/signup']) ?>
                        </li>
                        <li class="navbar-list">
                            <?= Html::a(Icon::show('shopping-cart').'Cart', ['cart/index']) ?>
                        </li>
                    <?php else : ?>
                        <li class="navbar-list">

                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                               role="button">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><?= Html::a(Icon::show('user').'Account', ['user/dashboard']) ?></li>
                                <li class="divider" role="presentation"></li>
                                <li><?= Html::a(Icon::show('sign-out').'Logout', ['site/logout'],['data-method' => 'post']) ?></li>
                            </ul>
                        </li>



                        <li class="navbar-list">
                            <?= Html::a(Icon::show('shopping-cart').'Cart', ['cart/index']) ?>
                        </li>
                    <?php endif?>


                </ul>
            </div>

            <div class="collapse navbar-search-overlap" id="example-navbar-default-search">
                <form lpformnum="14" role="search">
                    <div class="form-group">
                        <div class="input-search">
                            <i class="input-search-icon wb-search" aria-hidden="true"></i>
                            <input class="form-control" name="site-search" placeholder="Search..." type="text">
                            <button type="button" class="input-search-close icon wb-close" data-target="#example-navbar-default-search" data-toggle="collapse" aria-label="Close">

                            </button>
                        </div>
                    </div>
                </form>
            </div><!--collapse navbar-search-overlap-->
        </div><!--Container fluid-->


    </nav>


    <div class="container">
        <nav class="navbar navbar-inverse" id="categories-nav" role="navigation">
            <div class="container-fluid" id="icons-menu">
                <ul class="nav navbar-nav">

                    <li><a href="javascript:void(0)">Beauty experience</a></li>
                    <li><a href="javascript:void(0)">Food and drinks</a></li>
                    <li><a href="javascript:void(0)">Events and activities</a></li>
                    <li><a href="javascript:void(0)">Fitness and health</a></li>
                    <li><a href="javascript:void(0)">Hair treatment</a></li>

                </ul>




            </div><!--Container fluid-->


        </nav><!--the nav at the top-->
    </div>



    <div class="wrap">
        <div class="container" id="page-container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div> <!--page container-->
    </div><!--wrap-->

    <footer class="footer">
        <div class="container">
            <div class="col-md-3">
                <?= Html::a(Html::img('@web/images/logo_400x400.png', ['alt'=>Yii::$app->name]), ['site/index']) ?>
            </div>
            <div class="col-md-3">
                <h3>What is DoneDeal?</h3>
                <p class="center-justified">
                    Done Deal offers the best deals on services in
                    Uganda. Done Deal gives you an opportunity
                    to try out new experiences to a greatly
                    discounted price. Discover new restaurants,
                    spoil yourself with a spa treatment or surprise
                    your beloved one with a romantic getaway, all
                    in a simple and secure way.
                </p>
            </div>
            <div class="col-md-3  center-justified">
                <h3>Payment methods</h3>
                <?= Html::a(Html::img('@web/images/mmoney.png', ['alt'=>"Mtn MobileMoney"])) ?>
                <p></p>
                <?= Html::a(Html::img('@web/images/airtelmoney.png', ['alt'=>"Airtel Money"])) ?>

            </div>

            <div class="col-md-3">
                <h3>Explore</h3>
                <ul class="list-group">
                    <li class="list-group-item"><?= Html::a(' Term & conditions', ['site/terms']) ?> </li>
                    <li class="list-group-item"><?= Html::a(' Privacy', ['site/privacy']) ?> </li>
                    <li class="list-group-item"><?= Html::a(' Merchant registration', ['site/signup']) ?> </li>
                    <li class="list-group-item"><?= Html::a(' How it works', ['site/howitworks']) ?> </li>
                </ul>

            </div>

        </div>
        <div class="container-fluid">
           <div class="row">

               <p id="footer-p">&copy; 2016 - DoneDeal &nbsp;  <?= Icon::show('mobile').'
0200 905030'?>&nbsp; <?= Icon::show('envelope').'help@donedeal.ug'?>
                   <a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/profile.php?id=100009333363843&fref=ts" target="_blank"><span class="fa fa-facebook purple"></span></a>

                   <a href="https://twitter.com/DoneDealUg" target="_blank" class="btn btn-social-icon btn-lg btn-twitter"><i class="fa fa-twitter purple"></i></a>

                   <a target="_blank" href="https://www.instagram.com/donedealug/" class="btn btn-social-icon btn-lg btn-instagram"><i class="fa fa-instagram purple"></i></a> </p>
           </div>

        </div><!-- /.container-fluid -->
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
