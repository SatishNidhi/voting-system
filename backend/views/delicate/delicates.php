<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Ncc;
use common\models\Delicate;
use yii\helpers\Url;
use common\models\User;

use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\VoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delicates Info';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vote-index">

      <p>
        <b>Ncc</b> : <?php
                     $ncc = Ncc::findOne($ncc_id);
                     echo $ncc->title;

                    ?>

    </p>
    <br>
  <!--   <?php
    foreach($modelPositions as $modelPosition)
      {
         $column[] = [
                    'label' => $modelPosition->title,
                   'header' => $modelPosition->title,
                   'value'=>''
             ];
      }
      ?> -->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              ['class' => 'yii\grid\SerialColumn', 'header' => '<span style="color: #3C8DC2;">S.No</span>'],

            //'vote_id',
              'name',
              'email',
              'phone',
              'political_background',
              //'recommender_id',
               [
                    'attribute' => 'recommender_id',
                      'filter'=>ArrayHelper::map(User::find()->orderBy(['id'=>SORT_ASC])->all(), 'id', 'full_name'),

                    'value' => 'recommender.full_name',

            ],
            

             [
                    'attribute' => 'vote_id',
                    'header'=>'Vote',
                    'filter'=>false,
                    'format'=>'raw',
                    'value' => function ($data) {
                       return  '<a href="' . Url::base(true) . '/delicate/delicate?ncc_id=' . $data->ncc_id.'">vote</a>';
                    },

            ],
         
             

             ['class' => 'yii\grid\ActionColumn', 'header' => '<span style="color: #3C8DC2;">Action</span>'],
        ],
        
    ]); ?>



</div>
