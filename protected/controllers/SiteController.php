<?php

class SiteController extends Controller
{
	/**
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
	public function actionIndex()
	{
        $model=new Users;


        if(isset($_POST['Users']))
        {

            $model->attributes=$_POST['Users'];
            $model->passport_number = substr_replace($_POST['Users']['passport_number'], null, 0, 2);

            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('index',array(
            'model'=>$model,
        ));
	}

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $rand_id = rand(1, 4);
        $user_agent = Yii::app()->db->createCommand()
        ->select('name')
        ->from('user_agent')
        ->where('id=:id', array(':id'=>$rand_id))
        ->queryRow();


        $result['id'] = $id;
        $result['sum'] = 10;
        $result['user_agent']  = $user_agent['name'];

        $result['percent'] = Yii::app()->params['percent'];
        $result['ip'] = Yii::app()->request->getUserHostAddress();

        $this->render('view',array(
            'result'=>$result,
        ));
    }


	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}



	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}


}