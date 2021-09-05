<?php

use backend\widgets\CKEditor;
//use dosamigos\ckeditor\CKEditor;
use codezeen\yii2\tinymce\TinyMce;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
    .req {
        color: red;
        font-size: 15px;
        font-weight: bold;
    }
</style>

<div class="page-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class="row">
            <div class="col-md-8">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Yii::t('writesdown', 'Main Details') ?></h3>
                        <div class="box-tools pull-right">
                            <a href="#" data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="box-body">
                        <?= $form->field($model, 'image')->fileInput() ?>
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])->label('Title <span class="req">*</span>') ?>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Yii::t('writesdown', '<b>Excerpt</b> <span class="req">*</span>') ?></h3>
                        <div class="box-tools pull-right">
                            <a href="#" data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="box-body">
                        <?= $form->field($model, 'excerpt')->widget(CKEditor::className(), [
                            'options' => ['rows' => 3],
                            'preset' => 'full',
                            'clientOptions' => [
                                'filebrowserUploadUrl' => Url::to(['upload/url'])
                            ],
                        ])->label('Note: <i>Short Description</i>') ?>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Yii::t('writesdown', '<b>Content</b> <span class="req">*</span>') ?></h3>
                        <div class="box-tools pull-right">
                            <a href="#" data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="box-body">
                        <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                            'options' => ['rows' => 6],
                            'preset' => 'full',
                            'clientOptions' => [
                                'filebrowserUploadUrl' => Url::to(['upload/url'])
                            ],
                        ])->label('Note: <i>Detail Description</i>') ?>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Yii::t('writesdown', 'Status') ?></h3>
                        <div class="box-tools pull-right">
                            <a href="#" data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="box-body">
                        <h5><b>Date & Time</b></h5>
                        <div class="form-control">
                            <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;
                            <?php
                                $dt = new DateTime();
                                echo $dt->format('F j, Y H:i A');
                            ?>
                        </div><br>
                        <?php
                            echo $form->field($model, 'status')->dropDownList(
                                    ['0' => 'Unpublished', '1' => 'Published']
                            ); 
                        ?>
                    </div>
                    <div class="box-footer">
                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
