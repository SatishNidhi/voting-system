<?php
/**
 * @link http://www.writesdown.com/
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 *
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @since 0.1.0
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
     public $type;
    public $google_id;
    public $facebook_id;
    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required','on'=>'login'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {

        if ($this->validate()) {

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }


     public function logins()
    {
        if ($this->validate()) {

            return Yii::$app->user->login($this->getUserkey(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }
    
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUserkey()
    {

        if ($this->_user === false) {
            if($this->type=='facebook'){
                $this->_user = User::findOne(['fb_id' => $this->facebook_id]);
            }else{
               
                $this->_user = User::findOne(['google_id' => $this->google_id]);
            } 
        }
        
        return $this->_user;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
                         
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
