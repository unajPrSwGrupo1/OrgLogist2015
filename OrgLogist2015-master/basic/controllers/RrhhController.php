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
	$searchModel->setTableMode1();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionInactiv()
    {
        $searchModel = new RrhhSearch();
	$searchModel->setTableMode0();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rrhh model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
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
	$model->activate = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idRRHH]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rrhh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idRRHH]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rrhh model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $desactiv=$this->findActiv($id);
	$desactiv->activate = 0;
	if ($desactiv->update()!== false){
		return $this->redirect(['index']);
	}
	else{
		echo "Ha ocurrido un error al realizar el registro, redireccionando ...";
		echo "<meta http-equiv='refresh' content='8; ".Url::toRoute("rrhh")."'>";
	}
    }

    /**
     * Finds the Rrhh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rrhh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rrhh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findActiv($id)
    {
        if (($model = Rrhh::find()->where("idRRHH=:idRRHH",[":idRRHH" => $id] )
    		->andWhere("activate=:activate",[":activate" => 1])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Persona desactivada del sistema.');
        }
    }


}
