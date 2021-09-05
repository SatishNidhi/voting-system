<?php
/**
 * @link http://www.writesdown.com/
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

use backend\models\ContactSetting;
use frontend\widgets\RenderWidget;
use yii\helpers\Url;

$contactSetting = new ContactSetting();
$contactSetting = $contactSetting->find()->all();

/* @var $this yii\web\View */
/* @var $posts common\models\Post[] */
?>

<style type="text/css">
  
</style>

<section class="pre-footer-minimal bg-gray-dark">
        <div class="pre-footer-minimal-inner">
          <div class="shell text-center text-sm-left">
            <div class="range range-sm-center spacing-55">
               <?php foreach ($contactSetting as $key) { ?>
              <div class="cell-sm-12 cell-md-4 text-sm-center text-md-left">
                <h4>Quick Links</h4>
                <div class="row" style="display: inline-flex;">
                  <ul class="col-md-3 list-nav-marked">
                    <li><a href="<?= Url::base(true) ?>">Home</a></li>
                    <li><a href="<?= Url::base(true).'/about-us' ?>">About</a></li>
                  </ul>
                  <ul class="col-md-3 list-nav-marked">
                    <li><a href="<?= Url::base(true).'/site/showroom' ?>">Gallery</a></li>
                    <li><a href="<?= Url::base(true).'/site/dealer' ?>">Dealers</a></li>
                  </ul>
                  <ul class="col-md-3 list-nav-marked">
                    <li><a href="<?= Url::base(true).'/products' ?>">Products</a></li>
                    <li><a href="<?= Url::base(true).'/site/contact' ?>">Contact</a></li>
                  </ul>
                </div>
              </div>
              <div class="cell-sm-4 cell-md-4">
                <h4>Opening Hours</h4>
                <dl class="terms-list-inline">
                  <?= $key->open_hour ?>
                </dl>
              </div>
              <div class="cell-sm-4 cell-md-4">
                <h4>Contact Us</h4>
                <ul class="list-xxs">
                  <li><span class="fa fa-phone"></span>&nbsp;&nbsp;<?= $key->contact ?></li>
                  <li><span class="fa fa-envelope"></span>&nbsp;&nbsp;<?= $key->email ?></li>
                </ul>
              </div>
              <!-- <div class="cell-sm-4 cell-md-4">
                <h4>Address</h4>
                <address class="reveal-inline-block" style="max-width: 215px;">
                  <p><?= $key->address ?></p>
                </address>
              </div> -->
               <?php } ?>
            </div>
          </div>
        </div>
        <div class="shell">
          <hr class="gray">
        </div>
      </section>
      <footer class="page-footer-minimal">
        <div class="shell">
          <p class="rights">MG Motors &nbsp;&copy;&nbsp;<span id="copyright-year"></span>&nbsp;<br class="veil-sm">| Developed By: <a class="link-underline" target="_blank" href="http://Voting tech.com">Voting  Technologics</a>
          </p>
        </div>
      </footer>
<?php $this->registerJs('(function($){$(".widget ul").addClass("nav")})(jQuery);', $this::POS_END) ?>
