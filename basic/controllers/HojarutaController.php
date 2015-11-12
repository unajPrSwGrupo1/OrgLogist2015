<?php

namespace app\controllers;

use Yii;
use app\models\Hojaruta;
use app\models\HojarutaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HojarutaController implements the CRUD actions for Hojaruta model.
 */
class HojarutaController extends Controller
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
     * Lists all Hojaruta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HojarutaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hojaruta model.
     * @param integer $idHojaRuta
     * @param integer $Transporte_idTransporte
     * @param integer $Transporte_TIpoTransporte_idTIpoTransporte
     * @param integer $Transporte_RRHH_idRRHH
     * @param integer $Transporte_tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionView($idHojaRuta, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)
    {
        return $this->render('view', [
            'model' => $this->findModel($idHojaRuta, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH),
        ]);
    }

    /**
     * Creates a new Hojaruta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hojaruta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idHojaRuta' => $model->idHojaRuta, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_tiporrhh_idTipoRRHH' => $model->Transporte_tiporrhh_idTipoRRHH]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hojaruta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idHojaRuta
     * @param integer $Transporte_idTransporte
     * @param integer $Transporte_TIpoTransporte_idTIpoTransporte
     * @param integer $Transporte_RRHH_idRRHH
     * @param integer $Transporte_tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionUpdate($idHojaRuta, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)
    {
        $model = $this->findModel($idHojaRuta, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idHojaRuta' => $model->idHojaRuta, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_tiporrhh_idTipoRRHH' => $model->Transporte_tiporrhh_idTipoRRHH]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hojaruta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idHojaRuta
     * @param integer $Transporte_idTransporte
     * @param integer $Transporte_TIpoTransporte_idTIpoTransporte
     * @param integer $Transporte_RRHH_idRRHH
     * @param integer $Transporte_tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionDelete($idHojaRuta, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)
    {
        $this->findModel($idHojaRuta, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hojaruta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idHojaRuta
     * @param integer $Transporte_idTransporte
     * @param integer $Transporte_TIpoTransporte_idTIpoTransporte
     * @param integer $Transporte_RRHH_idRRHH
     * @param integer $Transporte_tiporrhh_idTipoRRHH
     * @return Hojaruta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idHojaRuta, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)
    {
        if (($model = Hojaruta::findOne(['idHojaRuta' => $idHojaRuta, 'Transporte_idTransporte' => $Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $Transporte_RRHH_idRRHH, 'Transporte_tiporrhh_idTipoRRHH' => $Transporte_tiporrhh_idTipoRRHH])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
