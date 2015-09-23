<?php

namespace app\controllers;

use Yii;
use app\models\Darsena;
use app\models\DarsenaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DarsenaController implements the CRUD actions for Darsena model.
 */
class DarsenaController extends Controller
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
     * Lists all Darsena models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DarsenaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Darsena model.
     * @param integer $idDarsena
     * @param integer $DarsenaEstado_idDarsenaEstado
     * @return mixed
     */
    public function actionView($idDarsena, $DarsenaEstado_idDarsenaEstado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idDarsena, $DarsenaEstado_idDarsenaEstado),
        ]);
    }

    /**
     * Creates a new Darsena model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Darsena();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idDarsena' => $model->idDarsena, 'DarsenaEstado_idDarsenaEstado' => $model->DarsenaEstado_idDarsenaEstado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Darsena model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idDarsena
     * @param integer $DarsenaEstado_idDarsenaEstado
     * @return mixed
     */
    public function actionUpdate($idDarsena, $DarsenaEstado_idDarsenaEstado)
    {
        $model = $this->findModel($idDarsena, $DarsenaEstado_idDarsenaEstado);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idDarsena' => $model->idDarsena, 'DarsenaEstado_idDarsenaEstado' => $model->DarsenaEstado_idDarsenaEstado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Darsena model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idDarsena
     * @param integer $DarsenaEstado_idDarsenaEstado
     * @return mixed
     */
    public function actionDelete($idDarsena, $DarsenaEstado_idDarsenaEstado)
    {
        $this->findModel($idDarsena, $DarsenaEstado_idDarsenaEstado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Darsena model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idDarsena
     * @param integer $DarsenaEstado_idDarsenaEstado
     * @return Darsena the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idDarsena, $DarsenaEstado_idDarsenaEstado)
    {
        if (($model = Darsena::findOne(['idDarsena' => $idDarsena, 'DarsenaEstado_idDarsenaEstado' => $DarsenaEstado_idDarsenaEstado])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
