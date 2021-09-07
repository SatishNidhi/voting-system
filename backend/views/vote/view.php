<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vote */

$this->title = $model->vote_id;
$this->params['breadcrumbs'][] = ['label' => 'Votes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vote-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vote_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vote_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'vote_id',
            [
            'attribute' => 'delicate_id',
            'value' =>  $model->delicate->name,
            ],  
             [
            'attribute' => 'candidate_id',
            'value' =>  $model->candidate->name,
            ],      
        ],
    ]) ?>

</div>
