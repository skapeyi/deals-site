<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use kartik\sidenav\SideNav;
use yii\bootstrap\Modal;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/donedeal.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div class="">
        <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <!--Create a row and a sidebar here -->
            <div  class="row">
                <div class="col-md-2">
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
                                    //['label' => "Add Deal", 'icon' => 'plus', 'url' =>['deal/create']],
                                    ['label' => "Deals", 'icon' => 'eye-open', 'url' => ['deal/index']],
                                    ['label' => "Deal Categories", 'icon' => 'eye-open', 'url' => ['category/index']],
                                    ['label' => "Deal Locations", 'icon' => 'pushpin', 'url' => ['location/index']],
                                    ['label' => "Merchants", 'icon' => 'eye-open', 'url' => ['admin/merchant']],
                                    ['label' => "Users", 'icon' => 'wrench', 'url' => ['admin/index']],
                                    ['label' => "Vouchers", 'icon' => 'gift', 'url' => ['voucher/index']],
                                    ['label' => "Reports", 'icon' => 'globe', 'url' => ['report/index']],
                                ]
                            ],
                            [
                                'url' => ['voucher/myvouchers'],
                                'label' => 'My Vouchers',
                                'icon' => 'tags'
                            ],
//                            [
//                                'url' => ['user/credit'],
//                                'label' => 'Credits',
//                                'icon' => 'gift'
//                            ],
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
                <div class="col-md-10">
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
