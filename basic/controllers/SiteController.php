<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\widgets\ActiveForm;
use yii\web\Response;
use app\models\RegisterForm;
use app\models\User;
use app\models\Tiporrhh;
use app\models\Rrhh;
use app\commands\Intranet;
use app\commands\Mailto;

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
		return $this->render ( 'not_has_view',['urlhead' => Intranet::getUrlHead()] );
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
		
	public function actionConfirm(){
		if (Yii::$app->request->get()){
			$id = Html::encode($_GET["id"]);
			$authKey = $_GET["authKey"];
			if ((int) $id){
				$usr = User::find()
				->where("idAutenticacion=:idAutenticacion", [":idAutenticacion" => $id])
				->andWhere("AuthKey=:AuthKey",[":AuthKey" => $authKey]);
				if ($usr->count() == 1){
					$activar = User::find()
					->where("idAutenticacion=:idAutenticacion", [":idAutenticacion" => $id])
					->andWhere("AuthKey=:AuthKey",[":AuthKey" => $authKey])->one();
					$activar->activate=1;
					if ($activar->update()!== false){
						echo "Enhorabuena registro llevado a cabo correctamente, redireccionando ...".$activar->username;
						echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
					}
					else{
						echo "Ha ocurrido un error al realizar el registro, redireccionando ...".$activar->username;
						echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("site/login")."'>";
					}
				}
				else return $this->redirect(["site/login"]);
			}
			else return $this->redirect(["site/login"]);
		}
	}


		
	public function actionRegister(){
		$model = new RegisterForm();
		$msg = null;
		if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax){
			Yii::$app->response->format =Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}
		if ($model->load(Yii::$app->request->post())){
		if ($model->validate())
			{
				$table = new User();
				$table->loadDefaultValues();
				$table->username = $model->username;
				$table->Mail = $model->Mail;
				$table->password = crypt($model->password, Yii::$app->params["salt"]);
				$table->Authkey = $this->randKey("abcdef0123456789", 200);
				$table->Token = $this->randKey("abcdef0123456789",200);
				$table->RRHH_idRRHH = $model->RRHH_idRRHH;
				$table->tiporrhh_idTipoRRHH = $model->tiporrhh_idTipoRRHH;
				if ($table->insert())
				{
					$user = User::find()->Where("AuthKey=:AuthKey",[":AuthKey" => $table->Authkey])->one();
					$id = urlencode($user->idAutenticacion);
					$authKey = urlencode($user->Authkey);
					$subject = "Confirmar registro";
					$body = "<h1>Haga click en el siguiente enlace para finalizar tu registro</h1>";
                    			$link=Intranet::getUrlHead()."/basic/web/index.php?r=site/confirm&id=".$id."&authKey=".$authKey;
					$body .= "<a href='".$link."'>Confirmar</a>";
					if(Yii::$app->params["adminEmail"] != 'email@gmail.com'){
						Yii::$app->mailer->compose()
							->setTo($user->Mail)
							->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
							->setSubject($subject)
							->setHtmlBody($body)
							->send();
						$msg = "Enhorabuena, ahora sólo falta que confirmes tu registro en tu cuenta de correo ";
					}
					else{
						$msg = "Confirmación alternativa ".Mailto::getUrlMailto(
											$user->Mail,$subject,"","",
											"Haga click en el siguiente enlace para finalizar tu registro",
											$link,
											"\nClick aquí para reenviar confirmación vía mailto:"
						);
					}
					$model->username = null;
					$model->Mail = null;
					$model->password = null;
					$model->password_repeat = null;
					
				}
				else{
					$msg = "Ha ocurrido un error al llevar a cabo tu  registro\n"."username=".$model->username."\npassword=".$model->password_repeat."\nemail=".$model->Mail."\n
					idRRHH=".$model->RRHH_idRRHH."\nidTipoRrhh=".$model->tiporrhh_idTipoRRHH;
				}
			}
		else $model->getErrors();
		}
		$subModelTiporrhh = new Tiporrhh();
		$subModelRrhh = new Rrhh();
		return $this->render("register", ["model" => $model, "msg"=> $msg,"subModelTiporrhh"=>$subModelTiporrhh,"subModelRrhh"=>$subModelRrhh]);
	}
}
