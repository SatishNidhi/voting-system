<?php
/**
 * @link http://www.writesdown.com/
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

use common\models\Option;
use common\models\Taxonomy;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use frontend\widgets\RenderWidget;
use common\models\User;

$user = User::findOne(Yii::$app->user->id);
/* @var $this yii\web\View */
/* @var $taxonomies common\models\Taxonomy[] */
$siteTitle = Option::get('sitetitle');

?>
   <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="<?=Url::base(true)?>" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title"><?=$siteTitle;?></span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="<?=Url::base(true)?>" class="nav-link "><span class="pcoded-micon"><i class="fa fa-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                
                
                     <li data-username="Sample Page" class="nav-item"><a href="<?=Url::base(true).'/delicate'?>" class="nav-link"><span class="pcoded-micon"><i class="fa fa-users"></i></span><span class="pcoded-mtext">Delicates</span></a></li>
            
                    <li data-username="Sample Page" class="nav-item"><a href="#" class="nav-link"><span class="pcoded-micon"><i class="fa fa-user-secret"></i></span><span class="pcoded-mtext">My Profile</span></a></li>
                    <li data-username="Sample Page" class="nav-item"><a href="<?=Url::base(true).'/site/logout'?>" class="nav-link"><span class="pcoded-micon"><i class="fa fa-sign-out"></i></span><span class="pcoded-mtext">Logout</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
