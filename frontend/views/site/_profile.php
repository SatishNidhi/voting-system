<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Ncc;
use yii\helpers\Url;
$this->title = "Update Profile";
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
                <h5><b>Update Profile</b></h5>
            </div>
            <div class="card-body">
                
               
                         <?php $form = ActiveForm::begin(); ?>
                          <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <?= $form->field($model, 'image')->fileInput()->label(false) ?>
                                <?php if (!$model->isNewRecord) {?>
                                 <div>
                                <?= Html::img(Url::base(true).'/public/img/' .$model->image,['style'=>'width:120px'])?>
                             <?= $form->field($model, 'image')->hiddenInput()->label(false); ?>
                   </div>
                 
                                <?php }?>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                   <?= $form->field($model, 'full_name')->textInput(['maxlength' => true])->label(false); ?>

                            </div>
                          </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                   <?php echo $form->field($model, 'email')->textInput(['maxlength' => true])->label(false); ?>

                            </div>
                          </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Viber Number</label>
                              <?= $form->field($model, 'mobile')->textInput(['maxlength' => true])->label(false); ?>

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