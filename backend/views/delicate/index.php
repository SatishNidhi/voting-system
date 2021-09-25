<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Ncc;
use common\models\Delicate;
use yii\helpers\Url;
use common\models\User;
use yii\bootstrap\Modal;

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
        
        <button onclick="ExportToExcel('xlsx')" class="btn btn-success"><span class="glyphicon glyphicon-save-file"></span> Download Excel File</button>&nbsp;

    </p>

  


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
                        Url::base(true).'/../public/img/'. $data['photo'],
                        ['width' => '150px']
                );
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
                 [
                    'attribute' => 'ncc_id',
                    'filter'=>ArrayHelper::map(Ncc::find()->orderBy(['title'=>SORT_ASC])->all(), 'ncc_id', 'title'),
                      'format' => 'raw',
                    'value' => function ($data) {
                       return  $data->ncc->title;
                    },
            ],
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
            'fb_link',
            [
              'attribute' => 'remarks',
              'format'=>'raw',
                'value'=>function ($data) {
                  $t = Url::base(true).'/delicate/comment?id='.$data->delicate_id;
                       return Html::button(
                            '<b><i class="fa fa-comment"></i></b>',
                            [
                                'value' => $t,
                                'class' => 'btn btn-default btn-xs modalViewsdk'
                            ]
                        );
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
<style>
  .grid-view {
    position: relative;
    overflow-y: scroll;
}
</style>

<table id="tbl_exporttable_to_xls" border="1" style="display: none">
<thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Delicate Name</th>
      <th scope="col">Membership Number</th>
      <th scope="col">Position</th>
     <th scope="col">Date</th>
           <th scope="col" onclick="sortTable()">Ncc</th>

      <!-- <th scope="col">NCC</th> -->
      <th scope="col">Political Background</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col"> Facebook Link </yh>
      <th scope="col">Recommender</th>
      <th scope="col">Comments</th>

      <?php 
      foreach($modelPositions as $modelPosition)
      {
          ?>
        <th scope="col"  onclick="sortTable()"><?=$modelPosition->title?></th>
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
        <!-- <a class="no-pjax" href="/voting-system/admin-vote/candidate/voter?id=1&amp;candidate=Ram" title="View">3</a> -->
     
           <td>
        <a class="no-pjax" href="<?=Url::base();?>/delicate/<?=$modelDelicate->delicate_id?>" title="View"> <?=$modelDelicate->name?></a>
           
        </td>
        <td><?=$modelDelicate->membership_number?></td>
        <td><?=$modelDelicate->delicate_position?></td>
       <td><?=date('Y-m-d',strtotime($modelDelicate->delicate_position_date));?></td>
               <td><?=$modelDelicate->ncc->title?></td>

        <td><?=$modelDelicate->political_background?></td>
        <td><?=$modelDelicate->phone?></td>
        <td><?=$modelDelicate->email?></td>
        <td><?=$modelDelicate->fb_link?></td>

        <td><?=$modelDelicate->recommender->full_name?></td>
        <td><?=$modelDelicate->remarks?></td>
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
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script>
  function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('candidate-info.' + (type || 'xlsx')));
    }
</script>

<?php
Modal::begin([
    'header' => '<h3 style="text-align: center">Delicate Remarks</h3>',
    'id' => 'reModalsdk',
    'size' => 'modal-md',
]);
echo "<div id='modalContents3'></div>";
Modal::end();
?>
<?php
$js = <<<JS
    $(function() {
        // get the click of the button
        $('.modalViewsdk').click(function() {
            $('#reModalsdk').modal('show')
                .find('#modalContents3')
                .load($(this).attr('value'));
        });

    });
JS;
$this->registerJs($js);
?>