<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Ncc;
use yii\helpers\Url;
$this->registerCssFile ( Url::to ( [ 
    '/css/widgets/responsiv-table.css' 
] ), [ 
    'depends' => [ 
        \frontend\assets\AppAsset::className () 
    ] 
] );
?>

<div class="main-body">
<div class="page-wrapper">
<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><b>Add Favourite Candidate</b></h5>
            </div>
            <div class="card-body">
                
               
                         <?php $form = ActiveForm::begin(); ?>
                          <div class="row">
                    

                          <?php 
                          $count = 0;
                          foreach ($modelPositions as $modelPosition)
                          {
                          ?>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vote for <?=$modelPosition->title?></label>

                                   <?php
                          foreach($modelPosition->candidate as $modelCandidate)
                              {
                          ?>

                          <div class="form-group form-check">
                                                            <input type="checkbox" class="form-check-input" id="candidate<?=$modelCandidate->candidate_id?>" name="candidate[<?=$count?>]" value="<?=$modelCandidate->candidate_id?>">&nbsp;
                                                            <label class="form-check-label" for="candidate<?=$modelCandidate->candidate_id?>"><?=$modelCandidate->name?></label>
                                                        </div>

                              
                          <?php
                          $count = $count + 1;
                              }
                            ?>


                            </div>
                          </div>
                            <?php

                            }
                            ?>

                             <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Remarks</label>

                                     <?= $form->field($model, 'remarks')->textarea(['rows' => 6])->label(false) ?>



                            </div>
                          </div>




                           
                                    <?= Html::submitButton('Save', ['class' => 'btn btn-secondary']) ?>

               <?php ActiveForm::end(); ?>
                    </div>
                    
                </div>
                

            </div>
        </div>
        
    </div>
</div>
<!-- [ Main Content ] end -->
</div>
</div>
