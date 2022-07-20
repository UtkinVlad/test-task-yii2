<?php
$db = require __DIR__ . '/db.php';

return [
    'id' => 'test-task-yii2',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'db' => $db,
        'request' => [
            'cookieValidationKey' => 'xabXDg8_yrIrbPr6FN3xi_HixUa75SQd',
            'baseUrl'=> '',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];