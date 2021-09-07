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
