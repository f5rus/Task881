<?php

class UserController extends Controller
{
	/** имя текст не менне 10 символов емаил 
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionLogin()
	{
            
            $model=new LoginForm;
            if(isset($_POST['LoginForm']))
            {
                // получаем данные от пользователя
                $model->attributes=$_POST['LoginForm'];
                // проверяем полученные данные и, если результат проверки положительный,
                // перенаправляем пользователя на предыдущую страницу
                if($model->validate())
                    $this->redirect(Yii::app()->user->returnUrl);
                }
                // рендерим представление    
            
            
		$this->render('Login',array('model'=>$model));
	}


	
}