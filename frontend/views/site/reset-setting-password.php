<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Ncc;
use yii\helpers\Url;
$this->title = "Passwoed Reset";

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
                <h5><b>Passwoed Reset</b></h5>
            </div>
            <div class="card-body">
                
               
                         <?php $form = ActiveForm::begin(); ?>
                          <div class="row">
                    

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Old Password</label>
                                   <?= $form->field($model, 'password_old')->passwordInput(['maxlength' => true])->label(false); ?>

                            </div>
                          </div>
                      </div>

                          <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">New Password</label>
                                   <?php echo $form->field($model, 'password')->passwordInput(['maxlength' => true])->label(false); ?>

                            </div>
                          </div>
                      </div>
                          
                          <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Repeat New Password</label>
                              <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true])->label(false); ?>

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