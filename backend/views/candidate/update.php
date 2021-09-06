<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Candidate */

$this->title = 'Update Candidate: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Candidates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->candidate_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="candidate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
