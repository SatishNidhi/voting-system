<?php
/**
 * @link http://www.writesdown.com/
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

use cebe\gravatar\Gravatar;
use codezeen\yii2\adminlte\widgets\Menu;
use common\models\Option;
use common\models\PostType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
?>

<aside class="main-sidebar">
    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <?= Gravatar::widget([
                        'email' => Yii::$app->user->identity->email,
                        'options' => ['alt' => 'Gravatar 45', 'class' => 'img-circle'],
                        'size' => 45,
                    ]) ?>
                </div>
                <div class="pull-left info">
                    <p><?= Yii::$app->user->identity->username ?></p>
                    <?= Html::a(
                        '<i class="fa fa-circle text-success"></i>' . Yii::t('writesdown', 'Online'),
                        ['/user/profile']
                    ) ?>
                </div>
            </div>
        <?php endif ?>

        <?php
        $adminMenu[0] = [
            'label' => Yii::t('writesdown', 'MAIN NAVIGATION'),
            'options' => ['class' => 'header'],
            'template' => '{label}',
        ];
        $adminMenu[1] = [
            'label' => Yii::t('writesdown', 'Dashboard'),
            'icon' => 'fa fa-dashboard',
            'url' => ['/site/index'],
            // 'items' => [
            //     ['icon' => 'fa fa-arrow-circle-right', 'label' => Yii::t('writesdown', 'Home'), 'url' => ['/site/index']],
            // ],
        ];
      
        $adminMenu[6] = [
            'label' => Yii::t('writesdown', 'Pages'),
            'icon' => 'fa fa-files-o',
            // 'url' => ['/page/index'],
            'items' => [
              
                [
                    'icon' => 'fa fa-arrow-circle-right',
                    'label' => Yii::t('writesdown', 'All Pages'),
                    'url' => ['/page/index'],
                    'visible' => Yii::$app->user->can('administrator'),
                ],
            ],
        ];
      
        
        // $adminMenu[20] = [
        //     'label' => Yii::t('writesdown', 'Appearance'),
        //     'icon' => 'fa fa-paint-brush',
        //     'items' => [
        //         ['icon' => 'fa fa-arrow-circle-right', 'label' => Yii::t('writesdown', 'Menus'), 'url' => ['/menu/index']],
        //     ],
        //     'visible' => Yii::$app->user->can('administrator'),
        // ];
        $adminMenu[60] = [
            'label' => Yii::t('writesdown', 'Users'),
            'icon' => 'fa fa-user',
            'items' => [
                [
                    'icon' => 'fa fa-arrow-circle-right',
                    'label' => Yii::t('writesdown', 'All Users'),
                    'url' => ['/user/index'],
                    'visible' => Yii::$app->user->can('administrator'),
                ],
                [
                    'icon' => 'fa fa-arrow-circle-right',
                    'label' => Yii::t('writesdown', 'Add New User'),
                    'url' => ['/user/create'],
                    'visible' => Yii::$app->user->can('administrator'),
                ],
                [
                    'icon' => 'fa fa-arrow-circle-right',
                    'label' => Yii::t('writesdown', 'My Profile'),
                    'url' => ['/user/profile'],
                    'visible' => Yii::$app->user->can('subscriber'),
                ],
                [
                    'icon' => 'fa fa-arrow-circle-right',
                    'label' => Yii::t('writesdown', 'Reset Password'),
                    'url' => ['/user/reset-password'],
                    'visible' => Yii::$app->user->can('subscriber'),
                ],
            ],
        ];
        $adminMenu[70] = [
            'label' => Yii::t('writesdown', 'Settings'),
            'icon' => 'fa fa-cogs',
            'items' => [
                [
                    'icon' => 'fa fa-arrow-circle-right',
                    'label' => Yii::t('writesdown', 'General'),
                    'url' => ['/setting/group?id=general'],
                    'visible' => Yii::$app->user->can('administrator'),
                ],
              
                [
                    'icon' => 'fa fa-arrow-circle-right', 
                    'label' => Yii::t('writesdown', 'Mail'), 
                    'url' => ['/mail/update/1'],
                    'visible' => Yii::$app->user->can('administrator'),
                ],
            ],
        ];
        // $adminMenu = ArrayHelper::merge($adminMenu, Option::getMenus(70));

        // if ($userAdminMenu = ArrayHelper::getValue(Yii::$app->params, 'adminMenu', [])) {
        //     $adminMenu = ArrayHelper::merge($adminMenu, $userAdminMenu);
        // }

        ksort($adminMenu);
        echo Menu::widget(['items' => $adminMenu]);
        ?>

    </section>
</aside>
