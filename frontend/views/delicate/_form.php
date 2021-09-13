<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Ncc;
use yii\helpers\Url;
use kartik\date\DatePicker;
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
                <h5><b>Create Delicates</b></h5>
            </div>
            <div class="card-body">
                
               
                         <?php $form = ActiveForm::begin(); ?>
                          <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Photo</label>
                                <?= $form->field($model, 'photo')->fileInput()->label(false) ?>
                                <?php if (!$model->isNewRecord) {?>
                                 <div>
                                <?= Html::img(Url::base(true).'/public/img/' .$model->photo,['style'=>'width:120px'])?>
                             <?= $form->field($model, 'photo')->hiddenInput()->label(false); ?>
                   </div>
                 
                                <?php }?>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Delicate Name</label>
                                   <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false); ?>

                            </div>
                          </div>
                               <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                              <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false); ?>

                            </div>
                          </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label(false); ?>


                            </div>
                          </div>


                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NCC</label>
                                   <?php echo $form->field($model, 'ncc_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map (Ncc::find ()->all(), 'ncc_id', 'title' ),
                    'language' => 'en',
                    'options' => ['placeholder' => '-Select NCC-'],                    
                  ])->label(false);
                ?>

                            </div>
                          </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Membership_number</label>
                              <?= $form->field($model, 'membership_number')->textInput(['maxlength' => true])->label(false); ?>

                            </div>
                          </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Position</label>
                                <?= $form->field($model, 'delicate_position')->textInput(['maxlength' => true])->label(false); ?>


                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Position</label>
                                <?= $form->field($model, 'delicate_position_date')->widget(DatePicker::classname(), [
                                    'options' => ['placeholder' => 'Enter Join date ...'],
                                    'pluginOptions' => [
                                        'autoclose'=>true
                                    ]
                                ])->label(false); ?>


                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Political Background</label>

                                     <?php
                            echo $form->field($model, 'political_background')->dropDownList(
                                    ['Congress' => 'Congress', 'UML' => 'UML']
                            )->label(false); ?>


                            </div>
                          </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fb Link</label>
                                <?= $form->field($model, 'fb_link')->textInput(['maxlength' => true])->label(false); ?>


                            </div>
                          </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Linkedln Link</label>
                                <?= $form->field($model, 'linkedln_link')->textInput(['maxlength' => true])->label(false); ?>


                            </div>
                          </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Twitter Link</label>
                                <?= $form->field($model, 'twitter_link')->textInput(['maxlength' => true])->label(false); ?>


                            </div>
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
