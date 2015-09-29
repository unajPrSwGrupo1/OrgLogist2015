<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\widgets\ActiveForm;
use yii\web\Response;

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
	
	public function actionLogin() {
		$model = new LoginForm ();
		$msg = null;
		if ($model->load ( Yii::$app->request->post () ) && Yii::$app->request->isAjax) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate ( $model );
		}
		if ($model->load ( Yii::$app->request->post () )) {
			if ($model->validate ()) {
				// Por ejemplo hacer una consulta a una base de datos
				$msg = "Ha iniciado correctamente...";
				$model->username = null;
				$model->password=null;
				return $this->render("menu",["model"=>$model, "msg"=>$msg]);
			} else {
				$msg = "Incorrecto, vuelva a intentar...";
				$model->getErrors ();
			}
		}
		return $this->render ( "login", [
				'model' => $model,
				'msg' => $msg
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
	 * Original
	 */
	public function actionMenu() {
		return $this->render ( 'menu' );
		}
	
}
