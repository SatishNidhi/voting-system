<?php
/**
 * @link http://www.writesdown.com/
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

use common\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\models\Option;
use common\models\User;

/* @var $this yii\web\View */
/* @var $assetBundle themes\writesdown\classes\assets\ThemeAsset */
/* @var $siteTitle string */
/* @var $tagLine string */

$url = $_SERVER['HTTP_HOST'];
$siteTitle = Option::get('sitetitle');
$user = User::findOne(Yii::$app->user->id);

?>

 <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="<?=Url::base(true)?>" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title"><?=$siteTitle?></span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="fa fa-window-maximize"></i></a></li>
           
            </ul>
            <ul class="navbar-nav ml-auto">
              
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                         <i class="fas fa-users-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="<?=Url::base(true).'/public/images'?>/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                <span><?=$user->full_name;?></span>
                                
                            </div>
                            <ul class="pro-body">
                                <li><a href="javascript:" class="dropdown-item"><i class="fa fa-user"></i> My Profile</a></li>
                                <li><a href="javascript:" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

 <style>
     .pcoded-header .dropdown .dropdown-toggle:after {
     content: unset; 

}
 </style>