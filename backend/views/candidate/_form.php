<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use common\models\Position;
/* @var $this yii\web\View */
/* @var $model common\models\Candidate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="candidate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'position_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map (Position::find ()->all(), 'position_id', 'title' ),
                    'language' => 'en',
                    'options' => ['placeholder' => '-Select Position-'],                    
                  ]);
                ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
