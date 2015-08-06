<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),    
    'bootstrap' => ['log'],
    'modules' => [
    //since the api is a module, we tell the app about the model
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => 'api\modules\v1\Module'
        ],
        'debug' => [
            'class' => 'yii\debug\Module',
        ],
    ],
        'components' => [  
    //tell the api to allow json input data, via the request component
        'request' => [
            'parsers' => [
              'application/json' => 'yii\web\JsonParser',
             ],
        ],      
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/user',
                    ],
                    'patterns' => [
                        //okay... if you want to a add any new pattern, add them before the inbuilt patterns.
                        'POST login' => 'login',
                        'POST resetpassword' => 'resetpassword',
                        'POST history' => 'history',
                        'POST update'  => 'update',
                        'POST updatepreferences'  => '',

                        //inbuilt patterns, don't change this.
                        'PUT,PATCH {id}' => 'update',
                        'DELETE {id}' => 'delete',
                        'GET,HEAD {id}' => 'view',
                        'POST' => 'create',
                        'GET,HEAD' => 'index',
                        '{id}' => 'options',
                        '' => 'options',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                    ],             
                
                ]
            ],        
        ]
    ],
    'params' => $params,
];



