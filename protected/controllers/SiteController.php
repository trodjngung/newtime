<?php

class SiteController extends Controller
{
	var $components = array('Xml');
	var $url = array(
			// "http://www.24h.com.vn/upload/rss/tintuctrongngay.rss",
			'dantri'=>"http://dantri.com.vn/trangchu.rss",
			'vnexpress'=>"http://vnexpress.net/rss/tin-moi-nhat.rss",
			'tinhte'=>"http://www.tinhte.vn/rss/",
			'kenh14'=>"http://kenh14.vn/home.rss",
		);
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
		$setting = Yii::app()->request->cookies['setting'];
		if(isset($_POST) && $_POST != NULL) {
			Yii::app()->request->cookies->clear();
			$cookie = new CHttpCookie('setting', json_encode($_POST['setting']));
			$cookie->expire = time()+60*60*24*180;
			Yii::app()->request->cookies['setting'] =  $cookie;//json_decode
			foreach ($_POST['setting'] as $key => $value) {
				if (!(Yii::app()->cache->get($value))) {
					$this->ReadRss($value);
				}
			}
			$this->render('index', array('setting'=>$this->url, 'cookies'=>$_POST['setting']));
		} elseif ($setting) {
			$data = json_decode($setting);
			foreach ($data as $key => $value) {
				if (!(Yii::app()->cache->get($value))) {
					$this->ReadRss($value);
				}
			}
			$this->render('index', array('setting'=>$this->url, 'cookies'=>$data));
		} else {
			$this->ReadRss('vnexpress');
			$this->render('index', array('setting'=>$this->url));
		}


		// {
		// 	$this->ReadRss('vnexpress');
		// 	$this->render('index', array('setting'=>$this->url));
		// }
		
		// if(Yii::app()->cache->get('vnexpress')) {
		// 	$this->render('index', array('setting'=>$this->url));
		// } else {
		// 	$this->ReadRss();
		// 	$this->render('index', array('setting'=>$this->url));
		// }
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
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
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

	/**
	* Read file xml test
	*/
	public function ReadRssAdmin()
	{
		foreach ($this->url as $key => $value) {
			$this->SaveCache($value, $key);
		}
	}

	public function SaveCache($url, $name)
	{
		$time = 30;
		$xmlString = Yii::app()->xml->xmlFileToString($url);
		$customFormInfo = Yii::app()->xml->xmlToArray($xmlString, $this , $cust_info);
		Yii::app()->cache->set($name, $customFormInfo, $time);
	}

	public function ReadRss($name)
	{
		$url = $this->url[$name];
		$time = 30;
		$xmlString = Yii::app()->xml->xmlFileToString($url);
		$customFormInfo = Yii::app()->xml->xmlToArray($name, $xmlString, $this , $cust_info);
		Yii::app()->cache->set($name, $customFormInfo, $time);
	}

	/**
	*Phân tích thông tin
	*pardam: dữ liệu đọc file rss
	*return: các thể loại đã được chia ra
	*/
	public function Categories($data)
	{

	}

}