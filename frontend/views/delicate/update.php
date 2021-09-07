<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Delicate */

$this->title = 'Update Delicate: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Delicates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->delicate_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delicate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
