<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'Rakovskiy',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        'modules\main\Bootstrap',
        'modules\users\Bootstrap',
    ],
    'modules' => [
        'main' => [
            'class' => 'modules\main\Module',
            'isBackend' => true
        ],
        'users' => [
            'class' => 'modules\users\Module',
            'isBackend' => true
        ],
        'rbac' => [
            'class' => 'modules\rbac\Module',
            'isBackend' => true
        ],
    ],
    'components' => [
        'user' => [
            'class' => 'modules\users\components\User',
            'identityClass' => 'modules\users\models\Users',
            'enableAutoLogin' => true,
            'loginUrl' => ['/users/guest/login'],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ],
        'request' => [
            'baseUrl' => '/backend'
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
            'errorAction' => 'main/default/error',
        ],
        'view' => [
            'theme' => 'themes\sb_admin\Theme'
        ],
    ],
    'params' => $params,
];
