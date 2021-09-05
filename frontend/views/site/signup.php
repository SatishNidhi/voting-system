	<?php
/**
 * @file      login.php.
 * @date      6/4/2015
 * @time      5:36 AM
 * @author    Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license   http://www.writesdown.com/license/
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use codezeen\yii2\adminlte\widgets\Alert;
use codezeen\yii2\tinymce\TinyMce;
use yii\bootstrap\Modal;
use yii\captcha\Captcha;
use common\models\LoginForm;
use common\models\Post;
use common\models\Settings;

/* MODEL */
use common\models\Option;
use yii\helpers\Url;
use yii\captcha\CaptchaAction;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Signup';
$this->params ['breadcrumbs'] [] = $this->title;
$this->registerCssFile ( Url::to ( [ 
    '/css/widgets/responsiv-table.css' 
] ), [ 
    'depends' => [ 
        \frontend\assets\AppAsset::className () 
    ] 
] );

?>

	
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<?php $form = ActiveForm::begin(['action' =>[''], 'options' => ['class' => 'login100-form validate-form']]); ?>
					<span class="login100-form-title p-b-49">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						  <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class'=>'input100', 'placeholder'=>'Type your username'])->label(false) ?>
						  						<span class="focus-input100" data-symbol="&#xf206;"></span>


					</div>

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Full Name</span>
						  <?= $form->field($model, 'full_name')->textInput(['maxlength' => true, 'class'=>'input100', 'placeholder'=>'Type your FullName'])->label(false) ?>
						 <span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Email</span>
						  <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class'=>'input100', 'placeholder'=>'Type your Email'])->label(false) ?>
						 <span class="focus-input100" data-symbol="&#128231;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Mobil Number</span>
						  <?= $form->field($model, 'mobile')->textInput(['maxlength' => true, 'class'=>'input100', 'placeholder'=>'Type your Mobile'])->label(false) ?>
						 <span class="focus-input100" data-symbol="&#xf2bc;"></span>
					</div>




					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						  <?= $form->field($model, 'password')->textInput(['maxlength' => true, 'class'=>'input100', 'type'=>'password', 'placeholder'=>'Type your password'])->label(false) ?>

						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Retype Password</span>
						  <?= $form->field($model, 'repassword')->textInput(['maxlength' => true, 'class'=>'input100', 'type'=>'password', 'placeholder'=>'Type your Repassword'])->label(false) ?>

						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						
					</div>
					
					
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Register
							</button>
						</div>
					</div>

		
			

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or You already have account ?
						</span>

						<a href="<?= Yii::$app->request->baseUrl?>/site/login" class="txt2">
							Login
						</a>
					</div>
                    <?php ActiveForm::end(); ?>
			</div>


	<style>
		.p-t-155 {
    padding-top: 75px;
}

	</style>


