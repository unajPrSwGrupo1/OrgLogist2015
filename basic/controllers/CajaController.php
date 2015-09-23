<?php

namespace app\controllers;

use Yii;
use app\models\Caja;
use app\models\CajaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CajaController implements the CRUD actions for Caja model.
 */
class CajaController extends Controller
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
     * Lists all Caja models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CajaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Caja model.
     * @param integer $idCaja
     * @param integer $TipoCaja_idTipoCaja
     * @return mixed
     */
    public function actionView($idCaja, $TipoCaja_idTipoCaja)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCaja, $TipoCaja_idTipoCaja),
        ]);
    }

    /**
     * Creates a new Caja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Caja();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCaja' => $model->idCaja, 'TipoCaja_idTipoCaja' => $model->TipoCaja_idTipoCaja]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Caja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idCaja
     * @param integer $TipoCaja_idTipoCaja
     * @return mixed
     */
    public function actionUpdate($idCaja, $TipoCaja_idTipoCaja)
    {
        $model = $this->findModel($idCaja, $TipoCaja_idTipoCaja);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCaja' => $model->idCaja, 'TipoCaja_idTipoCaja' => $model->TipoCaja_idTipoCaja]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Caja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idCaja
     * @param integer $TipoCaja_idTipoCaja
     * @return mixed
     */
    public function actionDelete($idCaja, $TipoCaja_idTipoCaja)
    {
        $this->findModel($idCaja, $TipoCaja_idTipoCaja)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Caja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idCaja
     * @param integer $TipoCaja_idTipoCaja
     * @return Caja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCaja, $TipoCaja_idTipoCaja)
    {
        if (($model = Caja::findOne(['idCaja' => $idCaja, 'TipoCaja_idTipoCaja' => $TipoCaja_idTipoCaja])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
