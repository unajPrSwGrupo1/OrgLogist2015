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
     * @param integer $Caja_idCaja
     * @return mixed
     */
    public function actionView($Estante_idEstante, $Caja_idCaja)
    {
        return $this->render('view', [
            'model' => $this->findModel($Estante_idEstante, $Caja_idCaja),
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
            return $this->redirect(['view', 'Estante_idEstante' => $model->Estante_idEstante, 'Caja_idCaja' => $model->Caja_idCaja]);
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
     * @param integer $Caja_idCaja
     * @return mixed
     */
    public function actionUpdate($Estante_idEstante, $Caja_idCaja)
    {
        $model = $this->findModel($Estante_idEstante, $Caja_idCaja);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Estante_idEstante' => $model->Estante_idEstante, 'Caja_idCaja' => $model->Caja_idCaja]);
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
     * @param integer $Caja_idCaja
     * @return mixed
     */
    public function actionDelete($Estante_idEstante, $Caja_idCaja)
    {
        $this->findModel($Estante_idEstante, $Caja_idCaja)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstanteHasCaja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Estante_idEstante
     * @param integer $Caja_idCaja
     * @return EstanteHasCaja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Estante_idEstante, $Caja_idCaja)
    {
        if (($model = EstanteHasCaja::findOne(['Estante_idEstante' => $Estante_idEstante, 'Caja_idCaja' => $Caja_idCaja])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
