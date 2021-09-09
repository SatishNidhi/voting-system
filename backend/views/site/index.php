<?php
/**
 * @link http://www.writesdown.com/
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

use cebe\gravatar\Gravatar;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $postCount int */
/* @var $commentCount int */
/* @var $userCount int */
/* @var $users common\models\User[] */
/* @var $posts common\models\Post[] */
/* @var $comments common\models\PostComment[] */

$this->title = Yii::t('writesdown', 'Dashboard');

?>
<style>
    a {
    color: #ffffff;
}
</style>
<div class="site-index">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-aqua">
            <a href="<?=Url::base();?>/delicate"> <span class="info-box-icon info-box-icon"><i class="fa fa-user-secret"></i></span>
                <div class="info-box-content">
                    <h4>Delicates</h4>
                    <!-- <p style="font-size: 20px; font-weight: bold;">0</p> -->
                </div>
            </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
            <a href="<?=Url::base();?>/candidate"><span class="info-box-icon"><i class="fa fa-user-secret"></i></span>
                <div class="info-box-content">
                    <h4>Candidates</h4>
                    <!-- <p style="font-size: 20px; font-weight: bold;">0</p> -->
                </div>
            </a>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
            <a href="<?=Url::base();?>/position">
                <span class="info-box-icon"><i class="fa fa-user-secret"></i></span>
                <div class="info-box-content">
                    <h4>Position</h4>
                    <!-- <p style="font-size: 20px; font-weight: bold;">0</p> -->
                </div>
            </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow">
                <a href="<?=Url::base();?>/user">
                <span class="info-box-icon"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                    <h4>Recommenders</h4>
                    <!-- <p style="font-size: 20px; font-weight: bold;">0</p> -->
                </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-12">
            <img src="<?=Url::base(true).'/../public/img/v.jpg'?>" width="100%">
        </div>
    </div>

</div>
