<?php

namespace app\controllers;

use Yii;
use app\models\Caja;
use app\models\CajaSearch;
use app\models\Tipocaja;
use app\models\TipocajaSearch;
use app\models\Physic;
use app\models\PhysicSearch;
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
        $subSearchTipo = new TipocajaSearch();
        $subSearchPhy = new PhysicSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $subDataProviderTipo = $subSearchTipo->search(Yii::$app->request->queryParams);
        $subDataProviderPhy = $subSearchPhy->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'subSearchTipo' => $subSearchTipo,
            'subDataProviderTipo' => $subDataProviderTipo,
            'subSearchPhy' => $subSearchPhy,
            'subDataProviderPhy' => $subDataProviderPhy
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
        $subModelTipo = new Tipocaja();//son los que toma del dropddownlist
        $subModelPhy = new Physic();//son los que toma del dropddownlist al crear

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCaja' => $model->idCaja, 'TipoCaja_idTipoCaja' => $model->TipoCaja_idTipoCaja]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'subModelTipo' => $subModelTipo,
                'subModelPhy' => $subModelPhy
            ]);
        }
    }
    
    /**
     * Creates a new Tipocaja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTipo()
    {
        $subModelTipo = new Tipocaja();
        
        if ($subModelTipo->load(Yii::$app->request->post()) && $subModelTipo->save()) {
            return $this->actionIndex();
        } else {
            return $this->render('../tipocaja/create', [
                'model' => $subModelTipo
            ]);
        }
    }

    /**
     * Creates a new Physic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPhysic()
    {
        $subModelPhy = new Physic();
        
        if ($subModelPhy->load(Yii::$app->request->post()) && $subModelPhy->save()) {
            return $this->actionIndex();
        } else {
            return $this->render('../physic/create', [
                'model' => $subModelPhy
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
        $subModelTipo = new Tipocaja();
        $subModelPhy = new Physic();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCaja' => $model->idCaja, 'TipoCaja_idTipoCaja' => $model->TipoCaja_idTipoCaja]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'subModelTipo' => $subModelTipo,
                'subModelPhy' => $subModelPhy,
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
    
    protected function findModelJoinTipo($idCaja, $TipoCaja_idTipoCaja)
    {
        if (($model = Caja::findOne(
        ['idCaja' => $idCaja, 'TipoCaja_idTipoCaja' => $TipoCaja_idTipoCaja])
        ->joinWith('tipocaja')) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
