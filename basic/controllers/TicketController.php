<?php

namespace app\controllers;

use Yii;
use app\models\Ticket;
use app\models\TicketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketController implements the CRUD actions for Ticket model.
 */
class TicketController extends Controller
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
     * Lists all Ticket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ticket model.
     * @param integer $idTicket
     * @param integer $MotivoTicket_idMotivoTicket
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @param integer $Transporte_idTransporte
     * @param integer $Transporte_TIpoTransporte_idTIpoTransporte
     * @param integer $Transporte_RRHH_idRRHH
     * @param integer $Transporte_tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionView($idTicket, $MotivoTicket_idMotivoTicket, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTicket, $MotivoTicket_idMotivoTicket, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH),
        ]);
    }

    /**
     * Creates a new Ticket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ticket();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTicket' => $model->idTicket, 'MotivoTicket_idMotivoTicket' => $model->MotivoTicket_idMotivoTicket, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_tiporrhh_idTipoRRHH' => $model->Transporte_tiporrhh_idTipoRRHH]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ticket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idTicket
     * @param integer $MotivoTicket_idMotivoTicket
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @param integer $Transporte_idTransporte
     * @param integer $Transporte_TIpoTransporte_idTIpoTransporte
     * @param integer $Transporte_RRHH_idRRHH
     * @param integer $Transporte_tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionUpdate($idTicket, $MotivoTicket_idMotivoTicket, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)
    {
        $model = $this->findModel($idTicket, $MotivoTicket_idMotivoTicket, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTicket' => $model->idTicket, 'MotivoTicket_idMotivoTicket' => $model->MotivoTicket_idMotivoTicket, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_tiporrhh_idTipoRRHH' => $model->Transporte_tiporrhh_idTipoRRHH]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ticket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idTicket
     * @param integer $MotivoTicket_idMotivoTicket
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @param integer $Transporte_idTransporte
     * @param integer $Transporte_TIpoTransporte_idTIpoTransporte
     * @param integer $Transporte_RRHH_idRRHH
     * @param integer $Transporte_tiporrhh_idTipoRRHH
     * @return mixed
     */
    public function actionDelete($idTicket, $MotivoTicket_idMotivoTicket, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)
    {
        $this->findModel($idTicket, $MotivoTicket_idMotivoTicket, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ticket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idTicket
     * @param integer $MotivoTicket_idMotivoTicket
     * @param integer $RRHH_idRRHH
     * @param integer $tiporrhh_idTipoRRHH
     * @param integer $Transporte_idTransporte
     * @param integer $Transporte_TIpoTransporte_idTIpoTransporte
     * @param integer $Transporte_RRHH_idRRHH
     * @param integer $Transporte_tiporrhh_idTipoRRHH
     * @return Ticket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTicket, $MotivoTicket_idMotivoTicket, $RRHH_idRRHH, $tiporrhh_idTipoRRHH, $Transporte_idTransporte, $Transporte_TIpoTransporte_idTIpoTransporte, $Transporte_RRHH_idRRHH, $Transporte_tiporrhh_idTipoRRHH)
    {
        if (($model = Ticket::findOne(['idTicket' => $idTicket, 'MotivoTicket_idMotivoTicket' => $MotivoTicket_idMotivoTicket, 'RRHH_idRRHH' => $RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $tiporrhh_idTipoRRHH, 'Transporte_idTransporte' => $Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $Transporte_RRHH_idRRHH, 'Transporte_tiporrhh_idTipoRRHH' => $Transporte_tiporrhh_idTipoRRHH])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
