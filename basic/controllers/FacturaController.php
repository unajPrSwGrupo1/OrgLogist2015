<?php

namespace app\controllers;

use Yii;
use app\models\Factura;
use app\models\FacturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FacturaController implements the CRUD actions for Factura model.
 */
class FacturaController extends Controller
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
     * Lists all Factura models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FacturaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Factura model.
     * @param integer $idFactura
     * @param integer $RRHH_idRRHH
     * @param integer $RRHH_TipoRRHH_idTipoRRHH
     * @param integer $Cliente_idCliente
     * @return mixed
     */
    public function actionView($idFactura, $RRHH_idRRHH, $RRHH_TipoRRHH_idTipoRRHH, $Cliente_idCliente)
    {
        return $this->render('view', [
            'model' => $this->findModel($idFactura, $RRHH_idRRHH, $RRHH_TipoRRHH_idTipoRRHH, $Cliente_idCliente),
        ]);
    }

    /**
     * Creates a new Factura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Factura();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idFactura' => $model->idFactura, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'RRHH_TipoRRHH_idTipoRRHH' => $model->RRHH_TipoRRHH_idTipoRRHH, 'Cliente_idCliente' => $model->Cliente_idCliente]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Factura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idFactura
     * @param integer $RRHH_idRRHH
     * @param integer $RRHH_TipoRRHH_idTipoRRHH
     * @param integer $Cliente_idCliente
     * @return mixed
     */
    public function actionUpdate($idFactura, $RRHH_idRRHH, $RRHH_TipoRRHH_idTipoRRHH, $Cliente_idCliente)
    {
        $model = $this->findModel($idFactura, $RRHH_idRRHH, $RRHH_TipoRRHH_idTipoRRHH, $Cliente_idCliente);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idFactura' => $model->idFactura, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'RRHH_TipoRRHH_idTipoRRHH' => $model->RRHH_TipoRRHH_idTipoRRHH, 'Cliente_idCliente' => $model->Cliente_idCliente]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Factura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idFactura
     * @param integer $RRHH_idRRHH
     * @param integer $RRHH_TipoRRHH_idTipoRRHH
     * @param integer $Cliente_idCliente
     * @return mixed
     */
    public function actionDelete($idFactura, $RRHH_idRRHH, $RRHH_TipoRRHH_idTipoRRHH, $Cliente_idCliente)
    {
        $this->findModel($idFactura, $RRHH_idRRHH, $RRHH_TipoRRHH_idTipoRRHH, $Cliente_idCliente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Factura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idFactura
     * @param integer $RRHH_idRRHH
     * @param integer $RRHH_TipoRRHH_idTipoRRHH
     * @param integer $Cliente_idCliente
     * @return Factura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idFactura, $RRHH_idRRHH, $RRHH_TipoRRHH_idTipoRRHH, $Cliente_idCliente)
    {
        if (($model = Factura::findOne(['idFactura' => $idFactura, 'RRHH_idRRHH' => $RRHH_idRRHH, 'RRHH_TipoRRHH_idTipoRRHH' => $RRHH_TipoRRHH_idTipoRRHH, 'Cliente_idCliente' => $Cliente_idCliente])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
