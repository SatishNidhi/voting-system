<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <p>
        <?= Html::a('<i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => '<span style="color:#3C8DBC">S.N</span>'],

            //'id',
            'slug',
            //'image',
            'title',
            //'excerpt:ntext',
            //'content:ntext',
            //'postby_id',
            //'created_at',
            //'updated_at',
            //'status',
            [        
                'attribute' => 'status',
                'filter'=>array("0"=>"Unpublished","1"=>"Published"),
                'value' => function ($model) {
                    return $model->status == 1 ? 'Published' : 'Unpublished';
                },
            ],


            ['class' => 'yii\grid\ActionColumn', 'header' => '<span style="color:#3C8DBC">Action</span>'],
        ],
    ]); ?>
</div>
