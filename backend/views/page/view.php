<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            //'id',
            'slug',
            //'image',
            [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/uploads/pages/'. $data['image'],
                        ['width' => '200px']);
                },
            ],
            'title',
            //'excerpt:ntext',
            [
                'attribute' => 'excerpt', 'format' => 'html'
            ],
            //'content:ntext',
            [
                'attribute' => 'content', 'format' => 'html'
            ],
            [        
                'attribute' => 'posted_by',
                'value' => function ($model) {
                    return $model->status == 1 ? 'Administrator' : 'Author';
                },
            ],
            'created_at',
            'updated_at',
            //'status',
            [        
                'attribute' => 'status',
                'filter'=>array("0"=>"Unpublished","1"=>"Published"),
                'value' => function ($model) {
                    return $model->status == 1 ? 'Published' : 'Unpublished';
                },
            ],
        ],
    ]) ?>

</div>
