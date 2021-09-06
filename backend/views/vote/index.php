<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Delicate;
use common\models\Candidate;

use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\VoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Votes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vote-index">

    <p>
        <?= Html::a('Create Vote', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              ['class' => 'yii\grid\SerialColumn', 'header' => '<span style="color: #3C8DC2;">S.No</span>'],

            //'vote_id',
            
             [
                    'attribute' => 'wd_delicate_id',
                    'value' =>'delicate.name',
                    'filter'=>ArrayHelper::map(Delicate::find()->orderBy(['name'=>SORT_ASC])->all(), 'delicate_id', 'name'),
            ],
             [
                    'attribute' => 'wd_candidate_id',
                    'value' =>'candidate.name',
                    'filter'=>ArrayHelper::map(Candidate::find()->orderBy(['name'=>SORT_ASC])->all(), 'candidate_id', 'name'),
            ],

             ['class' => 'yii\grid\ActionColumn', 'header' => '<span style="color: #3C8DC2;">Action</span>'],
        ],
    ]); ?>


</div>
