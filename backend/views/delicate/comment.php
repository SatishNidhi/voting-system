<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Ncc;
use yii\helpers\Url;
use kartik\date\DatePicker;
$this->title = 'Add Favourite Candidate';
$this->params['breadcrumbs'][] = ['label' => 'Delicates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
/* @var $model common\models\Delicate */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>

<div class="delicate-form">

    <?php $form = ActiveForm::begin(); ?>

       <div class="row">

                       

                             <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Remarks</label>

                                     <?= $form->field($model, 'remarks')->textarea(['rows' => 6])->label(false) ?>



                            </div>
                          </div>
       	
       </div>
   


        <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
