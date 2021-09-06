<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vote */

$this->title = 'Update Vote: ' . $model->vote_id;
$this->params['breadcrumbs'][] = ['label' => 'Votes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vote_id, 'url' => ['view', 'id' => $model->vote_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vote-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
