<?php
return [
    'name' => 'Rooms',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'currencyCode' => 'GBP',
        ],
        /*
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],
         * 
         */        
    ],    
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['simon'],
            'enableUnconfirmedLogin' => true,
            // you will configure your module inside this file
            // or if need different configuration for frontend and backend you may
            // configure in needed configs
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
    ],
    /*
    'on beforeAction' => function($event) {
        //Yii::$app->language='en-EN';           
        $msg = 'oooh!';
        mail("chrts.offire@gmail.com","Debugulon 3 RoomsAR " . time(),$msg);
    }
     * 
     */    
];
