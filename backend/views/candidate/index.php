<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Position;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CandidateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Candidates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="candidate-index">


    <p>
        <?= Html::a('Create Candidate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              ['class' => 'yii\grid\SerialColumn', 'header' => '<span style="color: #3C8DC2;">S.No</span>'],

            //'candidate_id',
            'name',
             [
                    'attribute' => 'position_id',
                    'value' =>'position.title',
                    'filter'=>ArrayHelper::map(Position::find()->orderBy(['title'=>SORT_ASC])->all(), 'position_id', 'title'),
            ],

             ['class' => 'yii\grid\ActionColumn', 'header' => '<span style="color: #3C8DC2;">Action</span>'],
        ],
    ]); ?>


</div>
