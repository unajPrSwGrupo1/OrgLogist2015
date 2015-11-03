<?php

namespace app\controllers;

use Yii;
use app\models\Pedido;
use app\models\PedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
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
     * Lists all Pedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedido model.
     * @param integer $idPedido
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @param integer $Cliente_idCliente
     * @return mixed
     */
    public function actionView($idPedido, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Cliente_idCliente)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPedido, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Cliente_idCliente),
        ]);
    }

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pedido();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPedido' => $model->idPedido, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH, 'Cliente_idCliente' => $model->Cliente_idCliente]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idPedido
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @param integer $Cliente_idCliente
     * @return mixed
     */
    public function actionUpdate($idPedido, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Cliente_idCliente)
    {
        $model = $this->findModel($idPedido, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Cliente_idCliente);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPedido' => $model->idPedido, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH, 'Cliente_idCliente' => $model->Cliente_idCliente]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idPedido
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @param integer $Cliente_idCliente
     * @return mixed
     */
    public function actionDelete($idPedido, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Cliente_idCliente)
    {
        $this->findModel($idPedido, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Cliente_idCliente)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idPedido
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @param integer $Cliente_idCliente
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPedido, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Cliente_idCliente)
    {
        if (($model = Pedido::findOne(['idPedido' => $idPedido, 'RRHH_idRRHH' => $RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $tiporrhh_idTipoRRHH, 'Cliente_idCliente' => $Cliente_idCliente])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
