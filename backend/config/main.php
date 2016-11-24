<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'Panel Administrador',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => "skin-green",
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        //esto habilita la vista con el template de admin-lte
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/backend/views'
                ],
            ],
        ],
        /*components\Request.php*/
        'request'=>[
            'class' => 'common\components\Request',
            'web'=> '/backend/web',
            'adminUrl' => '/admin'
        ],
        //Urls amigables
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],

    ],
    'params' => $params,
];
