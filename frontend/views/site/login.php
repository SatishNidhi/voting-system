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

$this->title = 'Login';
$this->params ['breadcrumbs'] [] = $this->title;
$this->registerCssFile ( Url::to ( [ 
    '/css/widgets/responsiv-table.css' 
] ), [ 
    'depends' => [ 
        \frontend\assets\AppAsset::className () 
    ] 
] );

?>
<style >
	.help-block{
		color: red;
	}
</style>

	
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<?php $form = ActiveForm::begin(['action' =>[''], 'options' => ['class' => 'login100-form validate-form']]); ?>
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						  <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class'=>'input100', 'placeholder'=>'Type your username'])->label(false) ?>
						  						<span class="focus-input100" data-symbol="&#xf206;"></span>


					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						  <?= $form->field($model, 'password')->textInput(['maxlength' => true, 'class'=>'input100', 'type'=>'password', 'placeholder'=>'Type your password'])->label(false) ?>

						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						 <?= Html::a('Forget Password?', ['site/request-password-reset']) ?>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Login Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" onclick="fb_login();" onlogin="checkLoginState();" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

					
						

						<a href="#" onclick="google_login();" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
						          <div class="g-signin2" onclick="ClickLogin()" data-onsuccess="onSignIn" data-theme="dark" style="display:none;"></div>

					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<a href="<?= Yii::$app->request->baseUrl?>/site/signup" class="txt2">
							Sign Up
						</a>
					</div>
                    <?php ActiveForm::end(); ?>
			</div>


	<style>
		.p-t-155 {
    padding-top: 75px;
}
	</style>


	 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.rawgit.com/oauth-io/oauth-js/c5af4519/dist/oauth.js"></script>
<script>
$('#linkedin-button').on('click', function() {
  // Initialize with your OAuth.io app public key
  OAuth.initialize('Ravuef0_9OtZ3h2xW8U_078yzV8');
  // Use popup for oauth
  OAuth.popup('linkedin2').then(linkedin => {
    console.log('linkedin:',linkedin);
    // Prompts 'welcome' message with User's email on successful login
    // #me() is a convenient method to retrieve user data without requiring you
    // to know which OAuth provider url to call
    linkedin.me().then(data => {
      console.log('me data:', data);
      alert('Linkedin says your email is:' + data.email + ".\nView browser 'Console Log' for more details");
    })
    // Retrieves user data from OAuth provider by using #get() and
    // OAuth provider url
    linkedin.get('/v2/me').then(data => {
      console.log('self data:', data);
    })
  });
})
</script>
<script>
$('#twitter-button').on('click', function() {
  // Initialize with your OAuth.io app public key
  OAuth.initialize('Ravuef0_9OtZ3h2xW8U_078yzV8');
  // Use popup for OAuth
  OAuth.popup('twitter').then(twitter => {
  //  console.log('twitter:', twitter);
    // Prompts 'welcome' message with User's email on successful login
    // #me() is a convenient method to retrieve user data without requiring you
    // to know which OAuth provider url to call
    twitter.me().then(response => {
      //console.log('data:', response);
     // alert('Twitter says your email is:' + data.email + ".\nView browser 'Console Log' for more details");
    });
    // Retrieves user data from OAuth provider by using #get() and
    // OAuth provider url    
    twitter.get('/1.1/account/verify_credentials.json?include_email=true').then(response => {
          $.ajax({
            type: 'GET',
            url: "<?= Url::to(['site/twitter']);?>",
            data: {id:response.id, name:response.name, screen_name:response.screen_name, type:'twitter',email:response.email}
          }).done(function(data){
            console.log(data);
            window.location.href = '<?= Yii::$app->request->baseUrl;?>/user/profile';
          }).fail(function() { 
            alert( "Posting failed." );
          });
      
    })    
  });
})
</script>

 <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="<?= $setting->google_client_id;?>">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
   
    <script>
   var clicked=false;//Global Variable
    function ClickLogin()
    {
        clicked=true;
    }
      function onSignIn(googleUser) {
      if (clicked) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
       if(profile){
        $.ajax({
          type: 'POST',
          url: "<?= Url::to(['site/google']);?>",
          data: {id:profile.getId(), name:profile.getName(), email:profile.getEmail(), type:'google'}
        }).done(function(data){
          console.log(data);
          window.location.href = '/user/profile';
        }).fail(function() { 
          alert( "Posting failed." );
        });
      }
      }
      };
    
      function google_login(){
        $('.g-signin2 > div').trigger('click');
      }
    </script> 
  <!-- facebook -->
  <script>
   function fb_login(){
    FB.login(function(response) {

        if (response.authResponse) {
            //console.log('Welcome!  Fetching your information.... ');
            //console.log(response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID

            FB.api('/me', function(response) {
                user_email = response.email; //get user email
          // you can store this data into your database             
            });

             FB.api('/me?fields=name,email', function(response) {
        $.ajax({
          type: 'POST',
          url: "<?= Url::to(['site/facebook']);?>",
          data: {id:response.id, name:response.name, email:response.email}
        }).done(function(data){
          console.log(data);
          window.location.href = '/user/profile';
        }).fail(function() { 
          alert( "Posting failed." );
        });


      });

        } else {
            //user hit cancel button
          //  console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'public_profile,email'
    });
}
// This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.


  window.fbAsyncInit = function() {
    FB.init({
      appId      : <?= $setting->facebook_app_id;?>,
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  
</script>