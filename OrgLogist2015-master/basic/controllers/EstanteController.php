<?php

namespace app\controllers;

use Yii;
use app\models\Estante;
use app\models\EstanteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstanteController implements the CRUD actions for Estante model.
 */
class EstanteController extends Controller
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
     * Lists all Estante models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstanteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estante model.
     * @param integer $idEstante
     * @param integer $EstanteEstado_idEstanteEstado
     * @return mixed
     */
    public function actionView($idEstante, $EstanteEstado_idEstanteEstado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEstante, $EstanteEstado_idEstanteEstado),
        ]);
    }

    /**
     * Creates a new Estante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Estante();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEstante' => $model->idEstante, 'EstanteEstado_idEstanteEstado' => $model->EstanteEstado_idEstanteEstado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Estante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idEstante
     * @param integer $EstanteEstado_idEstanteEstado
     * @return mixed
     */
    public function actionUpdate($idEstante, $EstanteEstado_idEstanteEstado)
    {
        $model = $this->findModel($idEstante, $EstanteEstado_idEstanteEstado);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEstante' => $model->idEstante, 'EstanteEstado_idEstanteEstado' => $model->EstanteEstado_idEstanteEstado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Estante model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idEstante
     * @param integer $EstanteEstado_idEstanteEstado
     * @return mixed
     */
    public function actionDelete($idEstante, $EstanteEstado_idEstanteEstado)
    {
        $this->findModel($idEstante, $EstanteEstado_idEstanteEstado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idEstante
     * @param integer $EstanteEstado_idEstanteEstado
     * @return Estante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEstante, $EstanteEstado_idEstanteEstado)
    {
        if (($model = Estante::findOne(['idEstante' => $idEstante, 'EstanteEstado_idEstanteEstado' => $EstanteEstado_idEstanteEstado])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
