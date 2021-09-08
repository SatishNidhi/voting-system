<?php
/**
 * @link http://www.writesdown.com/
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

use common\models\Option;
use frontend\assets\LoginAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$assetBundle =LoginAsset::register($this);

$url = $_SERVER['HTTP_HOST'];

/* @var $this \yii\web\View */
/* @var $content string */

// Canonical
$this->registerLinkTag(['rel' => 'canonical', 'href' => Yii::$app->request->absoluteUrl]);

// Favicon
$this->registerLinkTag([
    'rel' => 'icon',
    'href' => 'http://Voting .work/mg-motors/frontend/web/img/mg-fav.ico',
    'type' => 'image/x-icon',
]);

// Add meta robots noindex, nofollow when option disable_site_indexing = true
if (Option::get('disable_site_indexing')) {
    $this->registerMetaTag(['name' => 'robots', 'content' => 'noindex, nofollow']);
}

// Get site-title and tag-line
$siteTitle = Option::get('sitetitle');
$tagLine = Option::get('tagline');
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="facebook-domain-verification" content="qjg4hocmc6yp50xgicfcd26mpxzhr7" />

        <!-- Google Tag Manager -->


    <?= Html::csrfMetaTags() ?>
    <title>
        <?= $siteTitle.'::'.$this->title ?>
    </title>
    <?php $this->head() ?>
</head>
<body>
    


<?php $this->beginBody() ?>


    <div id="content">
    	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?=Url::base(true)?>/public/images/bg-01.jpg');">
        <?= $content ?>
    </div>
		</div>
	</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<style >
    .help-block{
        color: red;
        position: absolute;
        margin-bottom: 10px;
        font-size: 12px;
    }

    .wrap-input100 {
    width: 100%;
    position: relative;
    border-bottom: unset;
}
.fixed-button .btn {
    display: none;
}

</style>