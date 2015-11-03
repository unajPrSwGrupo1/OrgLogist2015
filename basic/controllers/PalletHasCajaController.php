<?php

namespace app\controllers;

use Yii;
use app\models\PalletHasCaja;
use app\models\PalletHasCajaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PalletHasCajaController implements the CRUD actions for PalletHasCaja model.
 */
class PalletHasCajaController extends Controller
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
     * Lists all PalletHasCaja models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PalletHasCajaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PalletHasCaja model.
     * @param integer $Pallet_idPallet
     * @param integer $Caja_idCaja
     * @return mixed
     */
    public function actionView($Pallet_idPallet, $Caja_idCaja)
    {
        return $this->render('view', [
            'model' => $this->findModel($Pallet_idPallet, $Caja_idCaja),
        ]);
    }

    /**
     * Creates a new PalletHasCaja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PalletHasCaja();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Pallet_idPallet' => $model->Pallet_idPallet, 'Caja_idCaja' => $model->Caja_idCaja]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PalletHasCaja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Pallet_idPallet
     * @param integer $Caja_idCaja
     * @return mixed
     */
    public function actionUpdate($Pallet_idPallet, $Caja_idCaja)
    {
        $model = $this->findModel($Pallet_idPallet, $Caja_idCaja);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Pallet_idPallet' => $model->Pallet_idPallet, 'Caja_idCaja' => $model->Caja_idCaja]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PalletHasCaja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Pallet_idPallet
     * @param integer $Caja_idCaja
     * @return mixed
     */
    public function actionDelete($Pallet_idPallet, $Caja_idCaja)
    {
        $this->findModel($Pallet_idPallet, $Caja_idCaja)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PalletHasCaja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Pallet_idPallet
     * @param integer $Caja_idCaja
     * @return PalletHasCaja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Pallet_idPallet, $Caja_idCaja)
    {
        if (($model = PalletHasCaja::findOne(['Pallet_idPallet' => $Pallet_idPallet, 'Caja_idCaja' => $Caja_idCaja])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
