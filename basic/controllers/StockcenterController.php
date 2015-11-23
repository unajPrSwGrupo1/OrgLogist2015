<?php

namespace app\controllers;

use Yii;
use app\models\Stockcenter;
use app\models\StockcenterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StockcenterController implements the CRUD actions for Stockcenter model.
 */
class StockcenterController extends Controller
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
     * Lists all Stockcenter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StockcenterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Stockcenter model.
     * @param integer $idStockCenter
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionView($idStockCenter, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        return $this->render('view', [
            'model' => $this->findModel($idStockCenter, $RRHH_idRRHH, $tiporrhh_idTipoRRHH),
        ]);
    }

    /**
     * Creates a new Stockcenter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Stockcenter();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idStockCenter' => $model->idStockCenter, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Stockcenter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idStockCenter
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionUpdate($idStockCenter, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        $model = $this->findModel($idStockCenter, $RRHH_idRRHH, $tiporrhh_idTipoRRHH);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idStockCenter' => $model->idStockCenter, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Stockcenter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idStockCenter
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionDelete($idStockCenter, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        $this->findModel($idStockCenter, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Stockcenter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idStockCenter
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @return Stockcenter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idStockCenter, $RRHH_idRRHH, $tiporrhh_idTipoRRHH)
    {
        if (($model = Stockcenter::findOne(['idStockCenter' => $idStockCenter, 'RRHH_idRRHH' => $RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $tiporrhh_idTipoRRHH])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
