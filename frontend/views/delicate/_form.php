<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Ncc;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Delicate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="delicate-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'photo')->fileInput() ?>
                            <?php if (!$model->isNewRecord) {?>
                             <div>
                            <?= Html::img(Url::base(true).'/../public/img/' .$model->photo,['style'=>'width:120px'])?>
                         <?= $form->field($model, 'photo')->hiddenInput()->label(false); ?>
                         </div>
                       
                       <?php }?>




    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'ncc_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map (Ncc::find ()->all(), 'ncc_id', 'title' ),
                    'language' => 'en',
                    'options' => ['placeholder' => '-Select NCC-'],                    
                  ]);
                ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>


     <?php
                            echo $form->field($model, 'political_background')->dropDownList(
                                    ['Congress' => 'Congress', 'UML' => 'UML']
                            ); ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
