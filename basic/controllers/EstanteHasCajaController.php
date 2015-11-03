<?php

namespace app\controllers;

use Yii;
use app\models\EstanteHasCaja;
use app\models\EstanteHasCajaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstanteHasCajaController implements the CRUD actions for EstanteHasCaja model.
 */
class EstanteHasCajaController extends Controller
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
     * Lists all EstanteHasCaja models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstanteHasCajaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstanteHasCaja model.
     * @param integer $Estante_idEstante
     * @param integer $Estante_EstanteEstado_idEstanteEstado
     * @param integer $Caja_idCaja
     * @param integer $Caja_TipoCaja_idTipoCaja
     * @return mixed
     */
    public function actionView($Estante_idEstante, $Estante_EstanteEstado_idEstanteEstado, $Caja_idCaja, $Caja_TipoCaja_idTipoCaja)
    {
        return $this->render('view', [
            'model' => $this->findModel($Estante_idEstante, $Estante_EstanteEstado_idEstanteEstado, $Caja_idCaja, $Caja_TipoCaja_idTipoCaja),
        ]);
    }

    /**
     * Creates a new EstanteHasCaja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EstanteHasCaja();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Estante_idEstante' => $model->Estante_idEstante, 'Estante_EstanteEstado_idEstanteEstado' => $model->Estante_EstanteEstado_idEstanteEstado, 'Caja_idCaja' => $model->Caja_idCaja, 'Caja_TipoCaja_idTipoCaja' => $model->Caja_TipoCaja_idTipoCaja]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EstanteHasCaja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Estante_idEstante
     * @param integer $Estante_EstanteEstado_idEstanteEstado
     * @param integer $Caja_idCaja
     * @param integer $Caja_TipoCaja_idTipoCaja
     * @return mixed
     */
    public function actionUpdate($Estante_idEstante, $Estante_EstanteEstado_idEstanteEstado, $Caja_idCaja, $Caja_TipoCaja_idTipoCaja)
    {
        $model = $this->findModel($Estante_idEstante, $Estante_EstanteEstado_idEstanteEstado, $Caja_idCaja, $Caja_TipoCaja_idTipoCaja);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Estante_idEstante' => $model->Estante_idEstante, 'Estante_EstanteEstado_idEstanteEstado' => $model->Estante_EstanteEstado_idEstanteEstado, 'Caja_idCaja' => $model->Caja_idCaja, 'Caja_TipoCaja_idTipoCaja' => $model->Caja_TipoCaja_idTipoCaja]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EstanteHasCaja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Estante_idEstante
     * @param integer $Estante_EstanteEstado_idEstanteEstado
     * @param integer $Caja_idCaja
     * @param integer $Caja_TipoCaja_idTipoCaja
     * @return mixed
     */
    public function actionDelete($Estante_idEstante, $Estante_EstanteEstado_idEstanteEstado, $Caja_idCaja, $Caja_TipoCaja_idTipoCaja)
    {
        $this->findModel($Estante_idEstante, $Estante_EstanteEstado_idEstanteEstado, $Caja_idCaja, $Caja_TipoCaja_idTipoCaja)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstanteHasCaja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Estante_idEstante
     * @param integer $Estante_EstanteEstado_idEstanteEstado
     * @param integer $Caja_idCaja
     * @param integer $Caja_TipoCaja_idTipoCaja
     * @return EstanteHasCaja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Estante_idEstante, $Estante_EstanteEstado_idEstanteEstado, $Caja_idCaja, $Caja_TipoCaja_idTipoCaja)
    {
        if (($model = EstanteHasCaja::findOne(['Estante_idEstante' => $Estante_idEstante, 'Estante_EstanteEstado_idEstanteEstado' => $Estante_EstanteEstado_idEstanteEstado, 'Caja_idCaja' => $Caja_idCaja, 'Caja_TipoCaja_idTipoCaja' => $Caja_TipoCaja_idTipoCaja])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
