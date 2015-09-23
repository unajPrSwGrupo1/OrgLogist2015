<?php

namespace app\controllers;

use Yii;
use app\models\Rrhh;
use app\models\RrhhSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RrhhController implements the CRUD actions for Rrhh model.
 */
class RrhhController extends Controller
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
     * Lists all Rrhh models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RrhhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rrhh model.
     * @param integer $idRRHH
     * @param integer $TipoRRHH_idTipoRRHH
     * @return mixed
     */
    public function actionView($idRRHH, $TipoRRHH_idTipoRRHH)
    {
        return $this->render('view', [
            'model' => $this->findModel($idRRHH, $TipoRRHH_idTipoRRHH),
        ]);
    }

    /**
     * Creates a new Rrhh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rrhh();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idRRHH' => $model->idRRHH, 'TipoRRHH_idTipoRRHH' => $model->TipoRRHH_idTipoRRHH]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rrhh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idRRHH
     * @param integer $TipoRRHH_idTipoRRHH
     * @return mixed
     */
    public function actionUpdate($idRRHH, $TipoRRHH_idTipoRRHH)
    {
        $model = $this->findModel($idRRHH, $TipoRRHH_idTipoRRHH);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idRRHH' => $model->idRRHH, 'TipoRRHH_idTipoRRHH' => $model->TipoRRHH_idTipoRRHH]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rrhh model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idRRHH
     * @param integer $TipoRRHH_idTipoRRHH
     * @return mixed
     */
    public function actionDelete($idRRHH, $TipoRRHH_idTipoRRHH)
    {
        $this->findModel($idRRHH, $TipoRRHH_idTipoRRHH)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rrhh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idRRHH
     * @param integer $TipoRRHH_idTipoRRHH
     * @return Rrhh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idRRHH, $TipoRRHH_idTipoRRHH)
    {
        if (($model = Rrhh::findOne(['idRRHH' => $idRRHH, 'TipoRRHH_idTipoRRHH' => $TipoRRHH_idTipoRRHH])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
