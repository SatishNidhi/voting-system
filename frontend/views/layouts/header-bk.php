<?php
/**
 * @link http://www.writesdown.com/
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

use backend\models\SocialMedia;
use common\models\Menu;
use themes\writesdown\classes\widgets\Nav;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $assetBundle themes\writesdown\classes\assets\ThemeAsset */
/* @var $siteTitle string */
/* @var $tagLine string */

$url = $_SERVER['HTTP_HOST'];

?>

<style type="text/css">
  #navbar-primary {
    background-color: #333; /* Black background color */
    position: fixed; /* Make it stick/fixed */
    width: 100%; /* Full width */
  }
  .media {
    padding-top: 6px;
    padding-right: 6px;
  }
  .media-icon{
    color: white;
    border: 1px solid;
    border-radius: 50%;
    padding: 2px 8px !important;
  }
  .head-xs {
    position: absolute;
    margin-top: -22px;
    font-size: 15px;
    padding-left: 110px;
    color: white;
  }
</style>

<!--<nav id="social-top">-->
<!--    <div class="container">-->
<!--        <ul class="pull-left visible-md visible-lg">-->

        <?php 
                // $socialMedia = SocialMedia::find()->where(['status'=>'1'])->all();
                // foreach ($socialMedia as $media) {
           ?>
<!--            <li><div class="media">-->
<!--                <a class="media-icon" href="<?= $media->link ?>" target="_blank"><i class="<?= $media->icon ?>"></i> </a></div>-->
<!--            </li>-->
            <?php //} ?>
<!--        </ul>-->
<!--        <ul class="pull-right">-->
<!--            <li>-->
<!--                <a href="<?= Url::base(true) . '/site/dealer' ?>" style="color: white !important;">Find A Dealer</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a class="btn btn-primary btn-square btn-sm btn-effect-ujarak" href="<?= Url::base(true) . '/site/booking' ?>"><span>BOOK A TEST DRIVE</span></a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->
<nav id="navbar-primary" class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <span class="visible-xs" style="padding: 15px; position: absolute;">
                <a href="<?= Url::base(true) ?>" title="MG">
                    <img src="<?= Url::base(true) . '/themes/mgmotor/assets/img/mg-logo.png' ?>" style="height: 52px;">
                    <span style="color: white; font-size: 22px; padding-left: 10px">PASSION DRIVES</span>
                    <?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone')) { ?>
                        <span style="position:relative; top: 20px; color: white; right: 120px">Since 1924</span>
                    <?php } else { ?>
                        <span class="head-xs">Since 1924</span>
                    <?php } ?>
                </a>
            </span>

            <button aria-expanded="false" data-target="#menu-primary" data-toggle="collapse"
                    class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- <span class="visible-md visible-lg" style="padding:11px 0 9px 0;">
            <a href="index.htm" title="MG"><img src="<?= $assetBundle->baseUrl . '/img/logos.png' ?>"></a>
            </span> -->
            <?php $brandTag = Yii::$app->controller->route == 'site/index' ? 'h1' : 'div' ?>
            <?= Html::beginTag($brandTag, ['class' => 'navbar-brand']) ?>
            <span class="visible-md visible-lg">
            <a href="<?= Url::base(true) ?>" style="color: white">
                <img src="<?= Url::base(true) . '/themes/mgmotor/assets/img/mg-logo.png' ?>" alt="MG Motor Logo" style="max-height: 90px; padding: 8px 0px;">
                <span style="position: absolute; margin-top:-8px; font-size: 25px; padding-left: 5px">Passion drives</span>
                <span style="font-size: 16px; padding-left: 55px; text-transform: capitalize; font-weight: 500;">Since 1924</span>
            </a>
            </span>
            <?= Html::endTag($brandTag) ?>

        </div>
        <div id="menu-primary" class="collapse navbar-collapse">
            <?= Nav::widget([
                'activateParents' => true,
                'options' => ['class' => 'nav navbar-nav navbar-right'],
                'items' => Menu::get('primary'),
                'encodeLabels' => false,
            ]) ?>

        </div>
    </div>
</nav>

<style type="text/css">
    #myBtn {
        display: block;
        position: fixed;
        bottom: 5px;
        /*right: 30px;*/
        z-index: 99;
        background: transparent;
    }
</style>

<span class="visible-lg visible-md">
<a id="myBtn" href="<?= Url::base(true) . '/site/booking' ?>">
    <img src="<?= Url::base(true) . '/themes/mgmotor/assets/img/test-drive.png' ?>" class="img-responsive">
</a>
</span>

<style>

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar a:hover {
  background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}

/*.content {*/
/*  margin-left: 75px;*/
/*  font-size: 30px;*/
/*}*/
</style>
<body>

<span class="visible-lg Visible-md">
<div class="icon-bar">
    <?php 
        $socialMedia = SocialMedia::find()->where(['status'=>'1'])->all();
        foreach ($socialMedia as $media) {
            $class = str_replace("fa fa-","",$media->icon);
    ?>
            <a class="<?= $class ?>" href="<?= $media->link ?>" target="_blank"><i class="fa fa-<?= $media->icon ?>"></i> </a>
    <?php } ?>
</div>
</span>

<script type="text/javascript">
//   window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//     document.getElementById("navbar-primary").style.top = "0px";
//   } else {
//     document.getElementById("navbar-primary").style.top = "45px";
//   }
// }
</script>

