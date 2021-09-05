<?php

use frontend\widgets\Alert;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Mail */

$this->title = 'Mail Setting';
$this->params['breadcrumbs'][] = ['label' => 'Settings'];
$this->params['breadcrumbs'][] = 'Mail Setting';
?>
<div class="mail-update">

	<?= Alert::widget() ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
