<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Ncc;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DelicateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delicates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delicate-index">


    <p>
        <?= Html::a('Create Delicate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              ['class' => 'yii\grid\SerialColumn', 'header' => '<span style="color: #3C8DC2;">S.No</span>'],

           [
                            'attribute' => 'photo',
                            'format' => 'html',    
                            'value' => function ($data) {
                                 return Html::img(
                                    Url::base(true).'/../public/img/'. $data['photo'],['width' => '90px']
                            );
                            },
                        ],
            'name',
            [
                    'attribute' => 'ncc_id',
                    'value' =>'ncc.title',
                    'filter'=>ArrayHelper::map(Ncc::find()->orderBy(['title'=>SORT_ASC])->all(), 'ncc_id', 'title'),
            ],
            'email:email',
            'phone',
            //'photo',
            //'political_background',
            //'remarks:ntext',
            //'created_at',
            //'recommender_id',

             ['class' => 'yii\grid\ActionColumn', 'header' => '<span style="color: #3C8DC2;">Action</span>'],
        ],
    ]); ?>


</div>
