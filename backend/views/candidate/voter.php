<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Ncc;
use common\models\User;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DelicateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Delicates :'.$_GET['candidate'];
$this->params['breadcrumbs'][] = ['label' => 'Candidates', 'url' => ['candidate/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delicate-index">


<p>
    <br>
        <?php // echo Html::a('Create Delicate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              ['class' => 'yii\grid\SerialColumn', 'header' => '<span style="color: #3C8DC2;">S.No</span>'],


            'name',
            [
                    'attribute' => 'ncc_id',
                    'value' =>'ncc.title',
                    'filter'=>ArrayHelper::map(Ncc::find()->orderBy(['title'=>SORT_ASC])->all(), 'ncc_id', 'title'),
            ],
            'email:email',
            'phone',
            [
                'attribute' => 'photo',
                'format' => 'html',    
                'value' => function ($data) {
                     return Html::img(
                        Url::base(true).'/../public/img/'. $data['photo'],['width' => '90px']
                );
                },
            ],
            //'photo',
            'political_background',
            //'remarks:ntext',
            //'created_at',
            [
                'attribute' => 'recommender_id',
                'value' =>'recommender.full_name',
                'filter'=>ArrayHelper::map(User::find()->orderBy(['full_name'=>SORT_ASC])->all(), 'user_id', 'full_name'),
        ],
        

             ['class' => 'yii\grid\ActionColumn', 'header' => '<span style="color: #3C8DC2;">Action</span>'],
        ],
    ]); ?>


</div>
