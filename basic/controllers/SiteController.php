<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\widgets\ActiveForm;
use yii\web\Response;
use app\models\FormRegister;
use app\models\User;
use app\commands\Intranet;

class SiteController extends Controller {
	
	public function behaviors() {
		return [ 'access' => [ 
						'class' => AccessControl::className (),
						'only' => ['logout'],
						'rules' => [['actions' => [ 'logout'],'allow' => true,'roles' => [ '@' ]] 
						] 
				],
				'verbs' => [ 
						'class' => VerbFilter::className (),
						'actions' => ['logout' => [ 'post'] ] 
					] 
			];
		}
		
	public function actions() {
		return [ 
				'error' => [ 
						'class' => 'yii\web\ErrorAction' 
				],
				'captcha' => [ 
						'class' => 'yii\captcha\CaptchaAction',
						'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null 
				] 
		];
	}
	
	public function actionIndex() {
		return $this->render ( 'index' );
	}
	
	public function actionNot_has_view() {
		return $this->render ( 'not_has_view' );
	}
	
	public function actionLogin() {
		$model = new LoginForm ();
		if ($model->load ( Yii::$app->request->post () ) && Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate ( $model );
		}
		if ($model->load ( Yii::$app->request->post () )) {
			if ($model->validate ()) {
				$roleRef=$model->username;$model->username = null;
				$model->password=null;
				return $this->render($model->getRole($roleRef),
						["model"=>$model,"msg"=>$model->getDescriptRole($roleRef),
						"arr"=>$model->getFunctionsRole($roleRef),"urlhead"=>Intranet::getUrlHead()]);
			} else {
				$model->getErrors ();
			}
		}
		return $this->render ( "login", [
				'model' => $model,
				'msg' => "Intente otra vez.."
		] );
	
	}
	
	
	public function actionLogout() {
		Yii::$app->user->logout ();
		
		return $this->goHome ();
	}
	
	public function actionContact() {
		$model = new ContactForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->contact ( Yii::$app->params ['adminEmail'] )) {
			Yii::$app->session->setFlash ( 'contactFormSubmitted' );
			
			return $this->refresh ();
		} else {
			return $this->render ( 'contact', [ 
					'model' => $model 
			] );
		}
	}
	
	public function actionAbout() {
		return $this->render ( 'about' );
	}
	
	/**
	 * 
	 */
	public function actionMenu() {
		return $this->render ( 'menu' );
		}
		
	private function randKey($str='', $long=0)
		{
			$key = null;
			$str = str_split($str);
			$start = 0;
			$limit = count($str)-1;
			for ($x=0; $x<$long; $x++)
				{$key .= $str[rand($start, $limit)];}
			return $key;
		}
		
	public function actionConfirm()
		{
		$table = new User;
		if (Yii::$app->request->get())
			{
				//Obtenemos el valor de los parámetros get
				$id = Html::encode($_GET["id"]);
				$authKey = $_GET["authKey"];
				if ((int) $id)
					{
						//Realizamos la consulta para obtener el registro
						$model = $table
						->find()
						->where("idAutenticacion=:idAutenticacion", [":idAutenticacion" => $id])
						->andWhere("authKey=:authKey",
								[":authKey" =>$authKey]);
						//Si el registro existe
						if ($model->count() == 1)
							{
								$activar = User::findOne($id);
								$activar->activate = 1;
								if ($activar->update())
									{
										echo "Enhorabuena registro llevado a cabo correctamente, redireccionando ...";
										echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
									}
								else
								{
									echo "Ha ocurrido un error al realizar el registro, redireccionando ...";
									echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
								}
							}
						else //Si no existe redireccionamos a login
						{
							return $this->redirect(["site/login"]);
						}
					}
				else //Si id no es un número entero redireccionamos a login
					{
						return $this->redirect(["site/login"]);
					}
			}
		}
		
	public function actionRegister()
	{
		$model = new FormRegister;
		$msg = null;
		if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
			{
				Yii::$app->response->format =Response::FORMAT_JSON;
				return ActiveForm::validate($model);
			}
		if ($model->load(Yii::$app->request->post()))
			{
				if ($model->validate())
					{
						$table = new User;
						$table->username = $model->username;
						$table->Mail = $model->Mail;
						$table->password = crypt($model->password, Yii::$app->params["salt"]);
						$table->Authkey = $this->randKey("abcdef0123456789", 200);
						$table->Token = $this->randKey("abcdef0123456789",200);
						if ($table->insert())
						{
							$user = $table->find()->where(["Mail" => $model->Mail])->one();
							$id = urlencode($user->idAutenticacion);
							$authKey = urlencode($user->Authkey);
							$subject = "Confirmar registro";
							$body = "<h1>Haga click en el siguiente enlace para finalizar tu registro</h1>";
							$body .= "<a href='http://localhost/basic/web/index.php?r=site/confirm&id= (http://localhost/basic/web/index.php?r=site/confirm&id=)".$id."&authKey=".$authKey."'>Confirmar</a>";
							Yii::$app->mailer->compose()
									->setTo($user->Mail)
									->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
									->setSubject($subject)
									->setHtmlBody($body)
									->send();
							$model->username = null;
							$model->Mail = null;
							$model->password = null;
							$model->password_repeat = null;
							$msg = "Enhorabuena, ahora sólo falta que confirmes tu registro en tu cuenta de correo";
						}
						else
							{
								$msg = "Ha ocurrido un error al llevar a cabo tu  registro";
							}
					}
				else
					{
						$model->getErrors();
					}
			}
		return $this->render("register", ["model" => $model, "msg"=> $msg]);
		}
}
