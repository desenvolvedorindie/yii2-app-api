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
    'controllerNamespace' => 'api\controllers',
    'defaultRoute' => 'v1/default',
    'modules' => [
        'v1' => [
            'basePath' => '@app/modules/v1',
            'class' => \api\modules\v1\Module::className(),
        ]
    ],
    'bootstrap' => [
    	'log',
        [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
                'application/xml' => \yii\web\Response::FORMAT_XML,
            ],
        ],
    ],
    'components' => [
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
        'urlManager' => [
			'rules' => [
                '<controller:\w+>/<id:[\d\-]+>' => 'v1/<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:[\d\-]+>' => 'v1/<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => 'v1/<controller>/<action>',
            ],
        ],
        'response' => [
            'class' => \yii\web\Response::className(),
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && ($exception = Yii::$app->getErrorHandler()->exception) !== null) {
                    $response->data = [
                        'error' => $response->data,
                    ];
                }
            },
                ],
            ],
            'params' => $params,
        ];
        
