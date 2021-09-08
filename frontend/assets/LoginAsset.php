<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * AppAsset is used to register asset files on frontend application.
 *
 * @author  Agiel K. Saputra <13nightevil@gmail.com>
 * @since   0.1.0
 */
class LoginAsset extends AssetBundle
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
                    'public/css/glide.core.min.css',
                    'public/vendor/bootstrap/css/bootstrap.min.css',
                
                    'public/fonts/font-awesome-4.7.0/css/font-awesome.min.css',
                    'public/fonts/iconic/css/material-design-iconic-font.min.css',
                    'public/vendor/animate/animate.css',
                    'public/vendor/css-hamburgers/hamburgers.min.css',
                    'public/vendor/animsition/css/animsition.min.css',
                    'public/vendor/select2/select2.min.css',
                    'public/vendor/daterangepicker/daterangepicker.css',
                    'public/css/util.css',

                    'public/css/main.css',




                ];
        $this->js = [
                    "public/vendor/jquery/jquery-3.2.1.min.js",
                     "https://cdn.jsdelivr.net/npm/@glidejs/glide",
                    "public/vendor/animsition/js/animsition.min.js",
                    "public/vendor/bootstrap/js/popper.js",
                    "public/vendor/select2/select2.min.js",
                    "public/vendor/daterangepicker/moment.min.js",
                    "public/vendor/daterangepicker/daterangepicker.js",
                    "public/vendor/countdowntime/countdowntime.js",
                    "public/js/main.js",


               


        ];

    }
}
