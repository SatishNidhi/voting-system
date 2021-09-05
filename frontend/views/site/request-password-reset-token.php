<?php

use codezeen\yii2\adminlte\widgets\Alert;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\models\PasswordResetRequestForm */

$this->title = 'Request password reset';
?>
<style >
    .help-block{
        color: red;
    }
</style>
    
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <?php $form = ActiveForm::begin(['action' =>[''], 'options' => ['class' => 'login100-form validate-form']]); ?>
                    <span class="login100-form-title p-b-49">
                        Verify Email
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                        <span class="label-input100">Email Address</span>
                          <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class'=>'input100', 'placeholder'=>'Type your Email Address','required'=>true])->label(false) ?>
                            <span class="focus-input100" data-symbol="&#x2709;"></span>


                    </div>

                    
                    
                    <div class="text-right p-t-8 p-b-31">
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                verify
                            </button>
                        </div>
                    </div>

               
                    <?php ActiveForm::end(); ?>
            </div>


    <style>
        .p-t-155 {
    padding-top: 75px;
}
    </style>