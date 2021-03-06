<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    
    'modules' => [
        'user' => [
            // following line will restrict access to profile, recovery, registration and settings controllers from backend
            'enableConfirmation' => false,
            'enableRegistration' => false,
            'as backend' => 'dektrium\user\filters\BackendFilter',
            'modelMap' => [
                'User' => 'common\models\User',
            ],            
            /*
            'controllerMap' => [
                'admin' => 'app\controllers\user\AdminController'
            ],
             * 
             */            
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],          
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        /*
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
         * 
         */
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],        
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'formatter' => [
            'datetimeFormat' => 'php:D jS M g:i A',
            //'decimalSeparator' => ',',
            //'thousandSeparator' => ' ',
            //'currencyCode' => 'EUR',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],        
    ],   
    'params' => $params,
];
