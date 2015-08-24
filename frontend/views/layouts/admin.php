<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use kartik\sidenav\SideNav;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'DoneDeal',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
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

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <!--Create a row and a sidebar here -->
            <div  class="row">
                <div class="col-md-3">
                    <?php echo SideNav::widget([
                        'type' => SideNav::TYPE_DEFAULT,
                        'heading' => 'My Account',
                        'items' => [
                            [
                                'url' => ['user/dashboard'],
                                'label' => 'Dashboard',
                                'icon' => 'home'
                            ],
                            [
                                'url' => "#",
                                'label' => 'Adminstrator',
                                'icon' => 'cloud',
                                'items'=>[
                                    ['label' => "Add Deal", 'icon' => 'plus', 'url' =>['deal/create']],
                                    ['label' => "All Deals", 'icon' => 'eye-open', 'url' =>''],
                                    ['label' => "Manage Users", 'icon' => 'wrench', 'url' =>''],
                                    ['label' => "All Vouchers", 'icon' => 'gift', 'url' =>''],
                                    ['label' => "Reports", 'icon' => 'globe', 'url' =>''],
                                ]

                            ],
                            [
                                'url' => ['user/voucher'],
                                'label' => 'My Vouchers',
                                'icon' => 'tags'
                            ],
                            [
                                'url' => ['user/credit'],
                                'label' => 'Credits',
                                'icon' => 'gift'
                            ],
                            [
                                'url' => ['user/password'],
                                'label' => 'Change Password',
                                'icon' => 'lock'
                            ],
                            [
                                'url' => ['user/preference'],
                                'label' => 'Update Preference',
                                'icon' => 'home'
                            ],
                            [
                                'url' => ['user/location'],
                                'label' => 'Add Your Location',
                                'icon' => 'map-marker'
                            ],

                        ],
                    ]); ?>

                </div>
                <div class="col-md-9">
                    <?= $content ?>
                </div>
            </div>


        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; DoneDeal <?= date('Y') ?></p>
        <p class="pull-right">The Best Deals In Town</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
