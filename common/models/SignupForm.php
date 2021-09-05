<?php
/**
 * @link      http://www.writesdown.com/
 * @copyright Copyright (c) 2015 WritesDown
 * @license   http://www.writesdown.com/license/
 */

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Class SignupForm
 *
 * @author  Agiel K. Saputra <13nightevil@gmail.com>
 * @since   0.1.0
 */
class SignupForm extends Model
{
   /**
     * @var string
     */
    public $username;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $password;
    /**
     * @var boolean
     */
     public $mobile;

      public $address;
    
    public $full_name;
    
    public $term_condition;
    
    public $repassword;
    
    public $captcha;

        public $reCaptcha;


    public $verificationCode;
   
    public $first_name;
       public $last_name;

    public $day;

    public $month;

    public $year;
  
  public $gender;




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            [['full_name','mobile','email','password',], 'required'],
             [['first_name','last_name','email','password','gender','day','month','year','password'], 'safe'],

            ['username', 'unique', 'targetClass' => '\common\models\AppUser', 'message' => 'This username has already been taken.'],

    
            // ['reCaptcha', 'required'],
            // [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className()],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
     
            ['email', 'unique', 'targetClass' => '\common\models\AppUser', 'message' => 'This email has already been taken.'],

            ['password', 'string', 'min' => 6],
            ['password', 'match', 'pattern' => '/^.*(?=.*[a-z])(?=.*[A-Z]).*$/','message'=>'The new password must contain at least one lowercase and uppercase letter.'],
            ['password', 'match', 'pattern' => '/^.*(?=.*\d).*$/','message'=>'The password must contain at least one digit.'],
            ['password', 'match', 'pattern' => '/^.*(?=.*[@#$%]).*$/','message'=>'The password must contain at least one special character (@, #, $,%).'],

            ['repassword','required'],
                ['repassword', 'compare', 'compareAttribute'=>'password', 'skipOnEmpty' => false, 'message'=>"Passwords does not matched"],
            ['term_condition', 'compare', 'compareValue' => true ,'message' => 'You must agree to the terms of use.']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
           
      
            $user = new User();
            $user->username = $this->email;
            $user->email = $this->email;
            $user->full_name = $this->full_name;
            $user->mobile = $this->mobile;

            $user->setPassword($this->password);
            $user->status = 10;
            $user->generateAuthKey();
            $user->user_type = 'subscriber';
            if ($user->save(false)) {
                // Yii::$app->authManager->assign(Yii::$app->authManager->getRole(Option::get('default_role')), $user->id);

                return $user;
            }

        return null;
    }
}
