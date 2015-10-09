<?php

namespace app\controllers;

use Yii;
use app\models\Transporte;
use app\models\TransporteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransporteController implements the CRUD actions for Transporte model.
 */
class TransporteController extends Controller
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

    /**
     * Lists all Transporte models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransporteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transporte model.
     * @param integer $idTransporte
     * @param integer $TIpoTransporte_idTIpoTransporte
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionView($idTransporte, $TIpoTransporte_idTIpoTransporte, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTransporte, $TIpoTransporte_idTIpoTransporte, $RRHH_idRRHH, $tiporrhh_idTipoRRHH),
        ]);
    }

    /**
     * Creates a new Transporte model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transporte();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTransporte' => $model->idTransporte, 'TIpoTransporte_idTIpoTransporte' => $model->TIpoTransporte_idTIpoTransporte, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Transporte model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idTransporte
     * @param integer $TIpoTransporte_idTIpoTransporte
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionUpdate($idTransporte, $TIpoTransporte_idTIpoTransporte, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        $model = $this->findModel($idTransporte, $TIpoTransporte_idTIpoTransporte, $RRHH_idRRHH, $tiporrhh_idTipoRRHH);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTransporte' => $model->idTransporte, 'TIpoTransporte_idTIpoTransporte' => $model->TIpoTransporte_idTIpoTransporte, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Transporte model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idTransporte
     * @param integer $TIpoTransporte_idTIpoTransporte
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionDelete($idTransporte, $TIpoTransporte_idTIpoTransporte, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        $this->findModel($idTransporte, $TIpoTransporte_idTIpoTransporte, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Transporte model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idTransporte
     * @param integer $TIpoTransporte_idTIpoTransporte
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return Transporte the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTransporte, $TIpoTransporte_idTIpoTransporte, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        if (($model = Transporte::findOne(['idTransporte' => $idTransporte, 'TIpoTransporte_idTIpoTransporte' => $TIpoTransporte_idTIpoTransporte, 'RRHH_idRRHH' => $RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $tiporrhh_idTipoRRHH])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
