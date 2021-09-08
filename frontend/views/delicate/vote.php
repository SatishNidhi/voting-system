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

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Delicate Name</th>
      <th scope="col">NCC</th>
      <th scope="col">Recommender</th>
      <?php 
      foreach($modelPositions as $modelPosition)
      {
          ?>
        <th scope="col">Vote for <?=$modelPosition->title?></th>
    <?php
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $sn=1;
    foreach($modelDelicates as $modelDelicate)
    {
        ?>
        <tr>
        <th scope="row"><?=$sn;?></th>
        <td><?=$modelDelicate->name?></td>
        <td><?=$modelDelicate->ncc->title?></td>
        <td><?=$modelDelicate->recommender->full_name?></td>
        <?php 
      foreach($modelPositions as $modelPosition)
      {
          ?>
        <td>
            <?php
            
                foreach($modelDelicate->votes as $modelVote){
                    if($modelVote->candidate->position_id == $modelPosition->position_id)
                        echo $modelVote->candidate->name.',';
                }
                ?>
        </td>
        <?php
            }
        ?>
        </tr>
    <?php
    $sn++;
        }
    ?>
    
  </tbody>
</table>
   

</div>
