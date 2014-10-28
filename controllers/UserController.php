<?php

class UserController extends Controller
{
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	
	public function actionLogin()
	{
            
            $model=new LoginForm;
            if(isset($_POST['LoginForm']))
            {
                
                $model->attributes=$_POST['LoginForm'];
                
                if($model->validate())
                    $this->redirect(Yii::app()->user->returnUrl);
                }
                
                $this->render('Login',array('model'=>$model));
	}


	
}
