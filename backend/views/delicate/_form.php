<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Ncc;
use yii\helpers\Url;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Delicate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delicate-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
      <div class="col-md-6">

        <?= $form->field($model, 'photo')->fileInput() ?>
                            <?php if (!$model->isNewRecord) {?>
                             <div>
                            <?= Html::img(Url::base(true).'/../public/img/' .$model->photo,['style'=>'width:120px'])?>
                         <?= $form->field($model, 'photo')->hiddenInput()->label(false); ?>
                         </div>
                       
                       <?php }?>
        </div>
              <div class="col-md-6">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
  </div>

    <div class="col-md-6">



    <?php echo $form->field($model, 'ncc_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map (Ncc::find ()->all(), 'ncc_id', 'title' ),
                    'language' => 'en',
                    'options' => ['placeholder' => '-Select NCC-'],                    
                  ]);
                ?>
              </div>
                    <div class="col-md-6">

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
  </div>
   <div class="col-md-6">


    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
  </div>

        <div class="col-md-6">

    <?= $form->field($model, 'membership_number')->textInput(['maxlength' => true]) ?>
  </div>
        <div class="col-md-6">

    <?= $form->field($model, 'delicate_position')->textInput(['maxlength' => true]) ?>
  </div>
        <div class="col-md-6">

    <?= $form->field($model, 'delicate_position_date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter Join date ...'],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]); ?>
  </div>
      
       
        <div class="col-md-6">


                      <?php
                            echo $form->field($model, 'political_background')->dropDownList(
                                    ['Congress' => 'Congress', 'UML' => 'UML']
                            ); ?>
          </div>
          <div class="col-md-6">

    <?= $form->field($model, 'fb_link')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-md-6">

    <?= $form->field($model, 'linkedln_link')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-md-6">

    <?= $form->field($model, 'twitter_link')->textInput(['maxlength' => true]) ?>
  </div>
        </div>




        <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
