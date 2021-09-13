<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

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
              
               [
                    'attribute' => 'ncc_id',
                      'format' => 'raw',
                    'value' => function ($data) {
                       return  '<a href="' . Url::base(true) . '/delicate/delicate?id=' . $data->ncc_id.'">'.$data->ncc->title.'</a>';
                    },
            ],


              'name',
              'membership_number',
              'delicate_position',
              'delicate_position_date',
              'email',
              'phone',
              'political_background',
              //'recommender_id',
               [
                    'attribute' => 'recommender_id',
                      'format'=>'raw',

                             'value' => function ($data) {
                       return  '<a href="' . Url::base(true) . '/user/view?id=' . $data->recommender->id.'">'.$data->recommender->full_name.'</a>';
                    },

            ],
            'remarks',
        ],
    ]) ?>

</div>

<h3> Favourite Candidates </h3>

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