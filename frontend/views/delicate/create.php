<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Delicate */

$this->title = 'Create Delicate';
$this->params['breadcrumbs'][] = ['label' => 'Delicates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delicate-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modelPositions'=>$modelPositions,
    ]) ?>

</div>
