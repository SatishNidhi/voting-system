<?php
use yii\web\Request;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$baseUrlBack = (new Request())->getBaseUrl() . '/admin';

return [
    'id'                  => 'app-frontend',
    'basePath'            => dirname(__DIR__),
    'controllerNamespace' => 'frontend\controllers',
    'bootstrap'           => ['log', 'common\components\FrontendBootstrap'],
    'modules'             => [],
    'components'          => [
        'user'            => [
            'identityClass'   => 'common\models\User',
            'enableAutoLogin' => false,
            'identityCookie' => [
                'name' => '_frontendUser', // unique for frontend
            ]
        ],
        'session' => [
            'name' => 'PHPFRONTSESSID',
            'savePath' => __DIR__ . '/../tmp',
        ],
        'log'             => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler'    => [
            'errorAction' => 'site/error',
        ],
        'i18n'            => [
            'translations' => [
                'writesdown' => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap'        => [],
                ],
            ],
        ],
   
            'urlManager' => [
                'class' => 'codemix\localeurls\UrlManager',
                'languages' => ['en', 'ne'],
            // 'class'     => 'yii\web\UrlManager',
                    // Disable index.php
                    'showScriptName' => false,
                    // Disable r= routes service?id=1
                    'enablePrettyUrl' => true,
                    'rules' => [
                            'post/<post_slug>' => 'post',
                            'file/<slug>' => 'file',
                            'product/category/<id>' => 'product/category',
                            'category/<id>' => 'category/',
                            'product/view/<id>' => 'product/view',
                            'product/view/<slug>' => 'product/view',
                            'brand/<id>' => 'brand/',
                            'category/index/<id>'  => 'category/index',
                            'category/<slug>' =>'category',
                            'content/<title>' => 'content/index/',
                            'blog-post/view/<id>' => 'blog-post/view',
                            'gallery/list/<id>' => 'gallery/list',
                    ]
            ],
           
        'urlManagerFront' => [
            'class' => 'yii\web\urlManager',
        ],
        'urlManagerBack'  => [
            'class'     => 'yii\web\urlManager',
            'scriptUrl' => $baseUrlBack . '/index.php',
            'baseUrl'   => $baseUrlBack,
        ],
        'authManager'     => [
            'class' => 'yii\rbac\DbManager',
        ],
        'view'            => ['theme' => []],
    ],
    'params'              => $params,
];
