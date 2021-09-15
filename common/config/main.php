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
                                'appId' => '2029893630498217',
                                'secret' => '2f8e2a063d072e5b381fdf439afd86b4',
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
        

        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                    'clientId' => '342259090298354',
                    'clientSecret' => 'e5ab820c84a69f3fbf72c992a0a9a48e',
                    'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
                ],

                'google' => [
                'class' => 'yii\authclient\clients\Google',
                'clientId' => '697976006233-l1tg2qd4gg0u547pv7r91lp0jvqot4rj.apps.googleusercontent.com',
                'clientSecret' => '9IF0tXQY0raSEqwQOYN-xnUE',
            ],
            
            ],
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
