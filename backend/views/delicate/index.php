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
<style>
.table-outter { overflow-x: scroll; }
</style>
<div class="delicate-index">


    <p>
        <?= Html::a('Create Delicate', ['create'], ['class' => 'btn btn-success']) ?>&nbsp;
        <button id="myButtonControlID" class="btn btn-success">
        <b><span class="glyphicon glyphicon-save-file"></span>&nbsp;&nbsp;Download Excel File</b>
      </button>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="table-outter" id="chart">
    <table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Delicate Name</th>
      <th scope="col" onclick="sortTable()">Ncc</th>
      <!-- <th scope="col">NCC</th> -->
      <th scope="col">Political Background</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col"> Photo </yh>
      <th scope="col">Recommender</th>
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
        <td><?=$modelDelicate->ncc->title?></td>
        <td><?=$modelDelicate->political_background?></td>
        <td><?=$modelDelicate->phone?></td>
        <td><?=$modelDelicate->email?></td>
        <td> 
            <?php
            echo Html::img(
                Url::base(true).'/../public/img/'. $modelDelicate->photo,['width' => '90px'])
            ?>
            </td>
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

</div>

<script>

function sortTable() {
 
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>

<!-- Used for excel report -->
<?php
$js = <<<JS
  $("[id$=myButtonControlID]").click(function(e) {
    chart = $('div[id$=chart]').clone();
    chart.find('.modal').remove();
    chart.find('.btn').remove();
    chart.find('.unwantedEdit').remove();
    $.each(chart.find('table'), function(index, table){
      table.style.border = "0.1pt solid #000";
      $.each($(table).find('th'), function(index, table){
        table.style.border = "0.1pt solid #000";
      });
      $.each($(table).find('td'), function(index, table){
        table.style.border = "0.1pt solid #000";
      });
    });
      window.open('data:application/vnd.ms-excel,' + encodeURIComponent( chart.html()));
      e.preventDefault();
  });
JS;
$this->registerJs($js);
?>