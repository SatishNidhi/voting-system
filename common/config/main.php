<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
        
    'modules' => [
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
        'request' => [

                'enableCookieValidation' => true,
        
                'enableCsrfValidation' => true,
        
                'cookieValidationKey' => 'xxxxxxx',
        
            ],
            
            'EmailComponent' => [
                    'class' => 'common\components\EmailComponent',
            ],
            'email' => 'common\components\Mail',
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class'     => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes service?id=1
            'enablePrettyUrl' => true,
            'rules' => [
          //  'post/<post_slug>' => 'post',
            ]
        ], 
         'reCaptcha' => [

            'name' => 'reCaptcha',

            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',

            'name' => 'reCaptcha',

            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',

            'siteKey' => '6Ld4wnobAAAAAJ-6R4EdHO5cANhVW_Lk_pJayGPh',

            'secret' => '6Ld4wnobAAAAAB6ys8TIUsD-E1HtMGJ0xJ01yyZD',
        ],
        
    ],
];
