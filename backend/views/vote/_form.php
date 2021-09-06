<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Candidate;
use common\models\Delicate;

/* @var $this yii\web\View */
/* @var $model common\models\Vote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vote-form">

    <?php $form = ActiveForm::begin(); ?>

       <?php echo $form->field($model, 'wd_delicate_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map (Delicate::find ()->all(), 'delicate_id', 'name' ),
                    'language' => 'en',
                    'options' => ['placeholder' => '-Select Delicate-'],                    
                  ]);
                ?>

     <?php echo $form->field($model, 'wd_candidate_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map (Candidate::find ()->all(), 'candidate_id', 'name' ),
                    'language' => 'en',
                    'options' => ['placeholder' => '-Select Candidate-'],                    
                  ]);
                ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
