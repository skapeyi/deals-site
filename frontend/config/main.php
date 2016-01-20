<?php
use kartik\mpdf\Pdf;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')

);

$vendorDir = dirname(__DIR__) . '/vendor';

return [
    'id' => 'app-frontend',
    'name' => 'DoneDeal',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['site/login'],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                //WRITE TO THIS LOG LIKE THIS -> Yii::info('The Message goes here, u can even add data in a variable','dev');
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['debug'],
                    'logFile' => '@app/runtime/logs/debug.log',
                    'logVars' => [null], ///turns off $_SERVER AND ALLL THAT JAZZ IN THE REQUEST IN THE LOGS
                ],
                //WRITE TO THIS LOG LIKE THIS -> Yii::info('The Message goes here, u can even add data in a variable','payment');
                //WE WILL WRITE ALL INFORMATION ABOUT PAYMENTS IN THIS LOG, EVEN DURING PRODUCTION
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['info'],
                    'categories' => ['payment'],
                    'logFile' => '@app/runtime/logs/payment.log',
                    'logVars' => [null],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '370013373167358',
                    'clientSecret' => '89d61c5fc8334d8c0d77a66a928a11f8',
                ],
//                'twitter' => [
//                    'class' => 'yii\authclient\clients\Twitter',
//                    'consumerKey' => 'twitter_consumer_key',
//                    'consumerSecret' => 'twitter_consumer_secret',
//                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'viewPath' => '@app/mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'help@donedeal.ug',
                'password' => 'Smultronstall3',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(

            ),
        ],
        //the mpdf global component
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/bootstrap.min.css',

            // refer settings section for all configuration options
        ],
        //the slider
        'mickgeek/yii2-daslider' => [
            'class' => 'mickgeek/yii2-daslider',
            'version' => '9999999-dev',
            'alias' => [
                '@mickgeek/daslider' => $vendorDir . '/mickgeek/yii2-daslider',
            ],
        ]
    ],
    'params' => $params,
];
