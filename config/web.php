<?php

use yii\redis\Cache;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$redis = require __DIR__ . '/redis.php';

$config = [
    'id' => 'basic',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'event/index',
    'name' => 'События',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'IwFIFi6KTGoYA65f2sflJpH85_Osae7f',
        ],
        'cache' => [
//            'class' => 'yii\caching\FileCache',
            'class' => Cache::class,
        ],
        'cache_dummy' => [
            'class' => \yii\caching\DummyCache::class,
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'redis' => $redis,

        'db' => $db,
//        'db_foo'=>[
//            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=127.0.0.1;dbname=foo',
//            'username' => 'foo',
//            'password' => 'foo',
//            'charset' => 'utf8',
//        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                'event/json/<id:\d+>' => 'event/json'
                '<controller>/<action>/<id:\d+>' => '<controller>/<action>',
            ],
        ],
        'formatter' => [
            'dateFormat'     => 'php:d-m-Y',
            'datetimeFormat' => 'php:d-m-Y в H:i:s',
            'timeFormat'     => 'php:H:i:s',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
