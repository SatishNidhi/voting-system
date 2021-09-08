<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Delicate */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Delicates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="delicate-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->delicate_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->delicate_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h3> Basic Information </h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'delicate_id',
            'name',
 [
            'attribute' => 'ncc_id',
            'value' =>  $model->ncc->title,

            ],             
             'email:email',
            'phone',
            [
                            'attribute' => 'photo',
                            'format' => 'html',    
                            'value' => function ($data) {
                                 return Html::img(
                                    Url::base(true).'/../public/img/'. $data['photo'],['width' => '150px']
                            );
                            },
                        ],
            'political_background',
            'remarks:ntext',
            'created_at',
            [
            'attribute' => 'recommender_id',
            'value' =>  $model->recommender->full_name,

            ],  
        ],
    ]) ?>

</div>

<h3> Votes </h3>

<table class="table table-striped table-bordered detail-view">
    <thead>
        <th> S.N. </th>
        <th> Position </th>
        <th> Candidate </th>
    </thead>
    <tbody>
        <?php 
        $sn = 1;
        foreach($modelVotes as $modelVote)
        {
            ?>
        <tr>
            <th><?=$sn?></th>
            <td><?=$modelVote->candidate->position->title?></td>
            <td><?=$modelVote->candidate->name?></td>
        </tr>
        <?php
        $sn++;
        }
        ?>
    </tbody>
</table>