<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'NewShop',
    'basePath' => dirname(__DIR__),
    'language' => 'ru',
    'bootstrap' => ['log', 'debug'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'languages' => ['ru', 'kz', 'en', 'ch'],
            'enableDefaultLanguageUrlCode' => true,
            'rules' => [
                '/' => 'site/index',
                'login' => 'site/login',
                'signup' => 'site/signup',
                'contact' => 'site/contact',
                'about' => 'site/about',
                'delivery' => 'site/delivery',
                'payment' => 'site/payment',
                'return' => 'site/return',
                'card' => 'site/card',
                // правило для 2, 3, 4 страницы результатов поиска
                'category/search/query/<query:.*?>/page/<page:\d+>' => 'category/search',
                // правило для первой страницы результатов поиска
                'category/search/query/<query:.*?>' => 'category/search',
                // правило для первой страницы с пустым запросом
                'category/search' => 'category/search',
            ],
        ],
        'cart' => [
            'class' => 'frontend\components\CartComponent'
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '817664799099585',
                    'clientSecret' => '68228713cd8827c03396e0ce2478e515',
                ],
                'vkontakte' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => '7792684',
                    'clientSecret' => 'zyek1pfwgA3ANnWn7Zg4',
                ],
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '306944286639-7tqsja9dphu25icqkb119cloa4hr4q5s.apps.googleusercontent.com',
                    'clientSecret' => 'RH0p8PVjBGUY3lgGYP9TZnwn',
                ],
            ],
        ]
    ],
    'modules' => [
        'debug' => [
            'class' => 'yii\\debug\\Module',
            'panels' => [
                'httpclient' => [
                    'class' => 'yii\\httpclient\\debug\\HttpClientPanel',
                ],
            ],
        ],
    ],
    'params' => $params,
];
