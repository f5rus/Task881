<?php

class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $verifyCode;
    
    private $_identity;
    
    public function rules()
    {
        return array(
            array('username, verifyCode', 'required'),    
            array('password', 'authenticate'),
            array(
                'verifyCode',
                'captcha',
                // авторизованным пользователям код можно не вводить
                'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
            ),
        );
    }
    
    public function authenticate($attribute,$params)
    {
        $this->_identity=new UserIdentity($this->username,$this->password);
        if(!$this->_identity->_getUsersData())
            $this->addError('password','Неправильное имя пользователя или пароль.');
    }   
    
   
}
