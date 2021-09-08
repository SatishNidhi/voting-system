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

/* @var $this yii\web\View */
/* @var $taxonomies common\models\Taxonomy[] */
?>
   <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="<?=Url::base(true)?>" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title"><?=$user->full_name;?></span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="<?=Url::base(true)?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather fa fa-user"></i></span><span class="pcoded-mtext">Delicate</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?=Url::base(true).'/delicate'?>" class="">Delicates</a></li>
                            <li class=""><a href="<?=Url::base(true).'/delicate/vote'?>" class="">Votes</a></li>
                           
                        </ul>
                    </li>
            
                    <li data-username="Sample Page" class="nav-item"><a href="#" class="nav-link"><span class="pcoded-micon"><i class="fa fa-user-secret"></i></span><span class="pcoded-mtext">My Profile</span></a></li>
                    <li data-username="Sample Page" class="nav-item"><a href="<?=Url::base(true).'/site/logout'?>" class="nav-link"><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Logout</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
