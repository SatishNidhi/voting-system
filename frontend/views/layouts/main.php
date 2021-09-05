<?php
/**
 * @link http://www.writesdown.com/
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

use common\models\Option;
use frontend\assets\AppAsset;
use yii\helpers\Html;

$assetBundle =AppAsset::register($this);

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

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-PZX3T4R');</script>

<!-- End Google Tag Manager -->


    <?= Html::csrfMetaTags() ?>
    <title>
        <?= $this->title ?>
    </title>
    <?php $this->head() ?>
</head>
<body>
    
   <!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZX3T4R"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->

<?php $this->beginBody() ?>


    <div id="content">
        <?= $content ?>
    </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
