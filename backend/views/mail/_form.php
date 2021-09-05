<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Mail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mail-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>

    <div class="form-group">
        <?= Html::label(
            Yii::t('writesdown', 'Mail From'),
            'option-sitetitle',
            ['class' => 'col-sm-2 control-label']
        ) ?>
        <div class="col-sm-7">
            <?= $form->field($model, 'from')->textInput(['maxlength' => true, 'class' => 'form-control'])->label(false) ?>
            <p class="description" style="position: relative; margin-top: -20px;">
                <?= Yii::t('writesdown', 'This address is used for mailing purposes.') ?>
            </p>
        </div>
    </div>
    <div class="form-group">
        <?= Html::label(
            Yii::t('writesdown', 'Mail CC'),
            'option-sitetitle',
            ['class' => 'col-sm-2 control-label']
        ) ?>
        <div class="col-sm-7">
            <?= $form->field($model, 'cc')->textInput(['maxlength' => true, 'placeholder' => 'example@gmail.com'])->label(false) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::label(
            Yii::t('writesdown', 'Mail BCC'),
            'option-sitetitle',
            ['class' => 'col-sm-2 control-label']
        ) ?>
        <div class="col-sm-7">
            <?= $form->field($model, 'bcc')->textInput(['maxlength' => true,  'placeholder' => 'example@gmail.com'])->label(false) ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?= Html::submitButton(Yii::t('writesdown', 'Save'), ['class' => 'btn btn-flat btn-success']) ?>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
