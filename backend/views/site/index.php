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
<div class="site-index">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-aqua">
                <span class="info-box-icon info-box-icon"><i class="fa fa-user-secret"></i></span>
                <div class="info-box-content">
                    <h4>President</h4>
                    <p style="font-size: 20px; font-weight: bold;">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-user-secret"></i></span>
                <div class="info-box-content">
                    <h4>Vice President</h4>
                    <p style="font-size: 20px; font-weight: bold;">0</p>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-user-secret"></i></span>
                <div class="info-box-content">
                    <h4>Test1</h4>
                    <p style="font-size: 20px; font-weight: bold;">0</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-comments"></i></span>
                <div class="info-box-content">
                    <h4>Test2</h4>
                    <p style="font-size: 20px; font-weight: bold;">0</p>
                </div>
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
