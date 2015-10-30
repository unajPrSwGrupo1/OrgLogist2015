<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionInactiv()
    {
        $searchModel = new UserSearch();
	$searchModel->setTableMode0();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $searchModel->setTableMode1();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $idAutenticacion
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionView($idAutenticacion, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        return $this->render('view', [
            'model' => $this->findModel($idAutenticacion, $RRHH_idRRHH, $tiporrhh_idTipoRRHH),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
//        $model = new User();

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'idAutenticacion' => $model->idAutenticacion, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
	echo "Redireccionando al registro de usuario...";
	echo "<meta http-equiv='refresh' content='1; ".Url::toRoute("site/register")."'>";
    }

    public function actionUsernew()
    {
        $subModelRegister = new RegisterForm();
        
        if ($subModelRegister->load(Yii::$app->request->post()) && $subModelRegister->save()) {
            return $this->actionIndex();
        } else {
            return $this->render('../tipocaja/create', [
                'model' => $subModelTipo
            ]);
        }
    }


    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idAutenticacion
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionUpdate($idAutenticacion, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        $model = $this->findModel($idAutenticacion, $RRHH_idRRHH, $tiporrhh_idTipoRRHH);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idAutenticacion' => $model->idAutenticacion, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idAutenticacion
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionDelete($idAutenticacion, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        $desactiv=$this->findActiv($idAutenticacion, $RRHH_idRRHH, $tiporrhh_idTipoRRHH);
	$desactiv->activate = 0;
	if ($desactiv->update()!== false){
		return $this->redirect(['index']);
	}
	else{
		echo "Ha ocurrido un error al realizar el registro, redireccionando ...";
		echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("rrhh")."'>";
	}
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idAutenticacion
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idAutenticacion, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        if (($model = User::findOne(['idAutenticacion' => $idAutenticacion, 'RRHH_idRRHH' => $RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $tiporrhh_idTipoRRHH])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findActiv($idAutenticacion, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
	if (($model = User::find()
		->where(['idAutenticacion' => $idAutenticacion, 'RRHH_idRRHH' => $RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $tiporrhh_idTipoRRHH])
		->andWhere("activate=:activate",[":activate" => 1])->one()
	) !== null) return $model;
        else {
            throw new NotFoundHttpException('Usuario no desactivado del sistema.');
        }
    }

}
