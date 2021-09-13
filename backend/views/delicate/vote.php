<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Delicate;
use common\models\Candidate;
use common\models\Position;

use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\VoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Favourite Candidate of : '.$model->name;
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="vote-index">

    <p>
        <?= Html::a('Add Favourite Candidate', ['update-vote?id='.$_GET['id']], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              ['class' => 'yii\grid\SerialColumn', 'header' => '<span style="color: #3C8DC2;">S.No</span>'],

            //'vote_id',
            
             [
                    'attribute' => 'candidate_id',
                    'header'=>'Position',
                    'filter'=>ArrayHelper::map(Position::find()->orderBy(['title'=>SORT_ASC])->all(), 'position_id', 'title'),
                    'value' => function ($data) {
                      $delicate = Candidate::findOne($data->candidate_id);
                       return  $delicate->position->title;
                    },
            ],
             [
                    'attribute' => 'candidate_id',
                    'header'=>'Candidate',
                    'value' =>'candidate.name',
                    'filter'=>ArrayHelper::map(Candidate::find()->orderBy(['name'=>SORT_ASC])->all(), 'candidate_id', 'name'),
            ],

             // ['class' => 'yii\grid\ActionColumn', 'header' => '<span style="color: #3C8DC2;">Action</span>'],
        ],
    ]); ?>


</div>
