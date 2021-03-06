<?php
/**
 * @link      http://www.writesdown.com/
 * @copyright Copyright (c) 2015 WritesDown
 * @license   http://www.writesdown.com/license/
 */

namespace frontend\controllers;

use Yii;

use common\models\LoginForm;
use common\models\Option;
use common\models\PasswordResetRequestForm;
use common\models\Post;
use common\models\PostComment;
use common\models\ResetPasswordForm;
use common\models\SignupForm;
use common\models\User;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use common\models\FrontendLoginForm;
use common\models\AppLoginForm;
use common\models\AppUser;
use common\models\KeyLoginForm;
use yii\web\UploadedFile;
use common\models\Delicate;
use common\models\Position;
use common\models\Vote;
/**
 * Site controller.
 *
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @since 0.1.0
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'login',
                            'request-password-reset',
                            'reset-passwords',
                            'forbidden',
                            'not-found',
                            'terms',
                            'signup',
                            'google',
                            'facebook',
                        ],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'error','update','reset-setting'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
             'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'oAuthSuccess'],
            ],
        ];
    }

    /**
     * Show user count, post count, post-comment count on index (dashboard).
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = User::findOne(Yii::$app->user->id);
             $modelDelicates = Delicate::find()->where(['recommender_id'=>Yii::$app->user->id])->all();

   

        return $this->render('index', [
            'user'=>$user,
            'modelDelicates'=>$modelDelicates,
        
        ]);
    }

    /**
     * Show login page and process login page.
     *
     * @return string|\yii\web\Response
     */
     public function actionLogin()
    {

        if (yii::$app->user->id) {

    return $this->redirect(['/site/index']);

    }
      $this->layout='loginlayout';
      $model = new LoginForm();
      $model->scenario = "login";

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
         else {

            return $this->render('login', [
                    'model' => $model,
            ]);
        }
    }

    /**
     * Logout for current user and redirect to home of backend.
     *
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Show signup for guest to register on site while Option::get('allow_signup') is true.
     *
     * @return string|\yii\web\Response
     */
    public function actionSignup()
    {
        // Set layout and body class of register-page
           $this->layout='loginlayout';

        $model = new SignupForm();
        if (yii::$app->user->id) {

    return $this->redirect(['/site/index']);

    }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($user = $model->signup()) {

                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

      public function actionUpdate()
    {
        
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        }else{
       // $this->layout = 'user';
        $model = User::findOne(Yii::$app->user->id);
        
        if ($model->load(Yii::$app->request->post())) {
            $output = User::findOne($id);
            $upload = UploadedFile::getInstance($model,'image');
            if(!empty($upload))
            {
                $model->image = rand().$upload;
                if($output->image){
                    @unlink(Yii::getAlias('@root').'/public/img/'.$output->image);
                }
                $upload->saveAs(Yii::getAlias('@root').'/public/img/' .$model->image);
            }
          //  $model->access_level = 0;
        //  $model->role = 'userfrontend';
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', 'Successfully Update.');
                return $this->redirect(['update']);
            }
        }
        return $this->render('_profile', [
            'model' => $model,
        ]);
        }
    }


     public function actionResetSetting()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        }else{
            $model = User::findOne(Yii::$app->user->id);
            $model->setScenario('resetPassword');

            if ($model->load(Yii::$app->request->post())) {
                $model->setPassword($model->password);
                if ($model->save()) {
                    Yii::$app->getSession()->setFlash('success', 'Successfully Update.');
                    return $this->redirect(['update']);
                }
            }

            return $this->render('reset-setting-password', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Generate and send token to user's email for resetting password.
     *
     * @return string|\yii\web\Response
     */
    public function actionRequestPasswordReset()
    {
        // Change layout and body class of register page
             $this->layout='loginlayout';

        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
                Yii::$app->getSession()->setFlash('success', 'Please rest the password.');
                $user = User::find()->where(['email'=>$model->email])->one();
               

                return $this->redirect(['reset-passwords?token='.$user->password_reset_token]);
            
        }

        return $this->render('request-password-reset-token', [
            'model' => $model,
        ]);
    }

    /**
     * Show reset password. It requires param $token that generated on actionRequestPasswordReset which is sent to
     * user's email.
     *
     * @param $token
     * @return string|\yii\web\Response
     * @throws \yii\web\BadRequestHttpException
     */
    public function actionResetPasswords($token)
    {
        // Change layout and body class of reset password page
     $this->layout='loginlayout';


        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }


        //google login
    public function actionGoogle()
    {
          

        $user = User::find()->where(['email'=>$_REQUEST['email']])->one();
        if($user){
            $user->google_id = $_REQUEST['id'];
            $user->save(false);
       }else{
            $user = new User();
            $user->email = $_REQUEST['email'];
            $user->username = $_REQUEST['email'];
            $user->full_name = $_REQUEST['name'];
            $user->password_hash = 'hdfgfdgdf';
            $user->auth_key = 'hdfgfdgdf';
            $user->status = 10;
            $user->google_id = $_REQUEST['id'];
            $user->user_type = 'subscriber';
            if($user->save(false)){
                //Yii::$app->authManager->assign(Yii::$app->authManager->getRole($user->role), $user->id);
            }
        }
        $model = new LoginForm();
        $model->google_id = $user->google_id;
        $model->type = $_REQUEST['type'];
       $model->logins();
    }
    //facebook login
    public function actionFacebook()
    {
        $user = User::find()->where(['email'=>$_REQUEST['email']])->one();
        if($user){
            $user->facebook_id = $_REQUEST['id'];
            $user->save(false);
        }else{
            $user = new User();
            $user->email = $_REQUEST['email'];
            $user->username = $_REQUEST['email'];
            $user->full_name = $_REQUEST['name'];
            $user->password_hash = 'hdfgfdgdf';
            $user->auth_key = 'hdfgfdgdf';
            $user->status = 10;
            $user->facebook_id = $_REQUEST['id'];
            $user->access_level = 0;
            $user->user_type = 'subscriber';
            if($user->save(false)){
                //Yii::$app->authManager->assign(Yii::$app->authManager->getRole($user->role), $user->id);
            }
        }
        $model = new KeyLoginForm();
        $model->facebook_id = $user->facebook_id;
        $model->type = 'facebook';
        $model->loginkey();
    }


    /**
     * Render term and condition
     */
    public function actionTerms()
    {
        $this->layout = 'blank';
        Yii::$app->params['bodyClass'] = 'skin-blue layout-boxed sidebar-mini';

        return $this->render('terms');
    }

    /**
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionForbidden()
    {
        throw new ForbiddenHttpException(Yii::t('writesdown', 'You are not allowed to perform this action.'));
    }

    /**
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionNotFound()
    {
        throw new NotFoundHttpException(Yii::t('writesdown', 'Page not found'));
    }
}
