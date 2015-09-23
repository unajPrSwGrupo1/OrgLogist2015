<?php

namespace app\controllers;

use Yii;
use app\models\Stagearea;
use app\models\StageareaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StageareaController implements the CRUD actions for Stagearea model.
 */
class StageareaController extends Controller
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
     * Lists all Stagearea models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StageareaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Stagearea model.
     * @param integer $idStageArea
     * @param integer $TipoStageArea_idTipoStageArea
     * @return mixed
     */
    public function actionView($idStageArea, $TipoStageArea_idTipoStageArea)
    {
        return $this->render('view', [
            'model' => $this->findModel($idStageArea, $TipoStageArea_idTipoStageArea),
        ]);
    }

    /**
     * Creates a new Stagearea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Stagearea();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idStageArea' => $model->idStageArea, 'TipoStageArea_idTipoStageArea' => $model->TipoStageArea_idTipoStageArea]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Stagearea model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idStageArea
     * @param integer $TipoStageArea_idTipoStageArea
     * @return mixed
     */
    public function actionUpdate($idStageArea, $TipoStageArea_idTipoStageArea)
    {
        $model = $this->findModel($idStageArea, $TipoStageArea_idTipoStageArea);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idStageArea' => $model->idStageArea, 'TipoStageArea_idTipoStageArea' => $model->TipoStageArea_idTipoStageArea]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Stagearea model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idStageArea
     * @param integer $TipoStageArea_idTipoStageArea
     * @return mixed
     */
    public function actionDelete($idStageArea, $TipoStageArea_idTipoStageArea)
    {
        $this->findModel($idStageArea, $TipoStageArea_idTipoStageArea)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Stagearea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idStageArea
     * @param integer $TipoStageArea_idTipoStageArea
     * @return Stagearea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idStageArea, $TipoStageArea_idTipoStageArea)
    {
        if (($model = Stagearea::findOne(['idStageArea' => $idStageArea, 'TipoStageArea_idTipoStageArea' => $TipoStageArea_idTipoStageArea])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
