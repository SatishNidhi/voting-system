<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * AppAsset is used to register asset files on frontend application.
 *
 * @author  Agiel K. Saputra <13nightevil@gmail.com>
 * @since   0.1.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $depends = [
       // 'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        $this->css = [
                    'public/vendor/bootstrap/css/bootstrap.min.css',
                    'public/css/style.css',
                    "public/css/fontawesome-all.min.css",
                    'public/css/animate.min.css',
                    'public/css/feather.css',
                                        'public/css/datta-icon.css',





                ];
        $this->js = [
                   
                    "public/js/vendor-all.min.js",
                    "public/js/bootstrap.min.js",
                    "public/js/pcoded.min.js",
                    
                      

               


        ];

    }
}
