<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'ne',   
    'modules' => [
        'discussion' => [
            'class' => 'common\modules\discussion\Module',
        ],
                'social' => [
                        // the module class
                        'class' => 'kartik\social\Module',
        
                        // the global settings for the Disqus widget
                        'disqus' => [
                                'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
                        ],
        
                        // the global settings for the Facebook plugins widget
                        'facebook' => [
                                'appId' => '775416375896967',
                                'secret' => 'd84234684725488849ed891802027617',
                        ],
        
                        // the global settings for the Google+ Plugins widget
                        'google' => [
                                'clientId' => 'GOOGLE_API_CLIENT_ID',
                                'pageId' => 'GOOGLE_PLUS_PAGE_ID',
                                'profileId' => 'GOOGLE_PLUS_PROFILE_ID',
                        ],
        
                        // the global settings for the Google Analytics plugin widget
                        'googleAnalytics' => [
                                'id' => 'TRACKING_ID',
                                'domain' => 'TRACKING_DOMAIN',
                        ],
        
                        // the global settings for the Twitter plugin widget
                        'twitter' => [
                                'screenName' => 'TWITTER_SCREEN_NAME'
                        ],
        
                        // the global settings for the GitHub plugin widget
                        'github' => [
                                'settings' => ['user' => 'GITHUB_USER', 'repo' => 'GITHUB_REPO']
                        ],
                ],
                // your other modules
        ],  
    'components' => [
            'EmailComponent' => [
                    'class' => 'common\components\EmailComponent',
            ],
            'email' => 'common\components\Mail',
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
           // 'class'     => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes service?id=1
            'enablePrettyUrl' => true,
            'rules' => [
             // 'post/<post_slug>' => 'post',
            ]
        ], 
  
    ],
    'on beforeRequest'          => function ($event) {
        Yii::$container->set('yii\grid\DataColumn', [
            'filterInputOptions' => [
                'class'       => 'form-control',
                'placeholder' => 'Search...'
            ]
        ]);
    },
];
