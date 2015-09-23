<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $idTicket
 * @property string $Descripcion
 * @property integer $MotivoTicket_idMotivoTicket
 * @property integer $RRHH_idRRHH
 * @property integer $RRHH_TipoRRHH_idTipoRRHH
 * @property integer $Transporte_idTransporte
 * @property integer $Transporte_TIpoTransporte_idTIpoTransporte
 * @property integer $Transporte_RRHH_idRRHH
 * @property integer $Transporte_RRHH_TipoRRHH_idTipoRRHH
 * @property string $Fecha
 * @property string $Hora
 *
 * @property Motivoticket $motivoTicketIdMotivoTicket
 * @property Rrhh $rRHHIdRRHH
 * @property Transporte $transporteIdTransporte
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MotivoTicket_idMotivoTicket', 'RRHH_idRRHH', 'RRHH_TipoRRHH_idTipoRRHH', 'Transporte_idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH', 'Transporte_RRHH_TipoRRHH_idTipoRRHH'], 'required'],
            [['MotivoTicket_idMotivoTicket', 'RRHH_idRRHH', 'RRHH_TipoRRHH_idTipoRRHH', 'Transporte_idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH', 'Transporte_RRHH_TipoRRHH_idTipoRRHH'], 'integer'],
            [['Fecha', 'Hora'], 'safe'],
            [['Descripcion'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTicket' => 'Id Ticket',
            'Descripcion' => 'Descripcion',
            'MotivoTicket_idMotivoTicket' => 'Motivo Ticket Id Motivo Ticket',
            'RRHH_idRRHH' => 'Rrhh Id Rrhh',
            'RRHH_TipoRRHH_idTipoRRHH' => 'Rrhh  Tipo Rrhh Id Tipo Rrhh',
            'Transporte_idTransporte' => 'Transporte Id Transporte',
            'Transporte_TIpoTransporte_idTIpoTransporte' => 'Transporte  Tipo Transporte Id Tipo Transporte',
            'Transporte_RRHH_idRRHH' => 'Transporte  Rrhh Id Rrhh',
            'Transporte_RRHH_TipoRRHH_idTipoRRHH' => 'Transporte  Rrhh  Tipo Rrhh Id Tipo Rrhh',
            'Fecha' => 'Fecha',
            'Hora' => 'Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotivoTicketIdMotivoTicket()
    {
        return $this->hasOne(Motivoticket::className(), ['idMotivoTicket' => 'MotivoTicket_idMotivoTicket']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRRHHIdRRHH()
    {
        return $this->hasOne(Rrhh::className(), ['idRRHH' => 'RRHH_idRRHH', 'TipoRRHH_idTipoRRHH' => 'RRHH_TipoRRHH_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransporteIdTransporte()
    {
        return $this->hasOne(Transporte::className(), ['idTransporte' => 'Transporte_idTransporte', 'TIpoTransporte_idTIpoTransporte' => 'Transporte_TIpoTransporte_idTIpoTransporte', 'RRHH_idRRHH' => 'Transporte_RRHH_idRRHH', 'RRHH_TipoRRHH_idTipoRRHH' => 'Transporte_RRHH_TipoRRHH_idTipoRRHH']);
    }
}
