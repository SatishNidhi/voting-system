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
        <?= Html::a('Create Delicate', ['create'], ['class' => 'btn btn-success']) ?>&nbsp;
        
              <?= Html::a('<span class="glyphicon glyphicon-save-file"></span> Download Excel File', ['csv'], ['class' => 'btn btn-success']) ?>&nbsp;

    </p>

  


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              ['class' => 'yii\grid\SerialColumn', 'header' => '<span style="color: #3C8DC2;">S.No</span>'],

              
               [
                    'attribute' => 'ncc_id',
                    'filter'=>ArrayHelper::map(Ncc::find()->orderBy(['title'=>SORT_ASC])->all(), 'ncc_id', 'title'),
                      'format' => 'raw',
                    'value' => function ($data) {
                       return  $data->ncc->title;
                    },
            ],


              
                   [
                    'attribute' => 'name',
                      'format' => 'raw',
                    'value' => function ($data) {
                       return  '<a href="' . Url::base(true) . '/delicate/vote?id=' . $data->delicate_id.'">'.$data->name.'</a>';
                    },
            ],
              'membership_number',
              'delicate_position',
              'delicate_position_date',
              'email',
              'phone',
             // 'political_background',
              //'recommender_id',
               [
                    'attribute' => 'recommender_id',
                      'filter'=>ArrayHelper::map(User::find()->orderBy(['id'=>SORT_ASC])->all(), 'id', 'full_name'),
                      'format'=>'raw',

                             'value' => function ($data) {
                       return  '<a href="' . Url::base(true) . '/user/view?id=' . $data->recommender->id.'">'.$data->recommender->full_name.'</a>';
                    },

            ],
            

            //  [
            //         'attribute' => 'vote_id',
            //         'header'=>'Vote',
            //         'filter'=>false,
            //         'format'=>'raw',
            //         'value' => function ($data) {
            //            return  '<a href="' . Url::base(true) . '/delicate/delicate?ncc_id=' . $data->ncc_id.'">vote</a>';
            //         },

            // ],
         
                  [
                'class' => 'yii\grid\ActionColumn',
                'header' => '<span style="color: #3C8DC2;">Action</span>',
                 'template' => '{vote}&nbsp;&nbsp;{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}',
                  'buttons' => [
                     'vote' => function ($url, $model) {
                      $t = Url::base(true).'/delicate/update-vote?id='.$model->delicate_id;
                        return Html::a('<span class="fa fa-plus"></span>',$t, [
                            'title' => Yii::t('yii', 'add favourite candidate'),
                            'class' => 'btn btn-default btn-xs'
                        ]);
                    },

                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-eye"></span>',$url, [
                            'title' => Yii::t('yii', 'View'),
                            'class' => 'btn btn-default btn-xs'
                        ]);
                    },
                      'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-edit"></span>',$url, [
                            'title' => Yii::t('yii', 'Update'),
                            'class' => 'btn btn-default btn-xs'
                        ]);
                    },

                     
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure to delete this item?'),
                            'data-method' => 'post',
                            'class' => 'btn btn-default btn-xs'
                        ]);
                    },
                    
                ],
            ],

        ],
        
    ]); ?>



</div>

