<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factura".
 *
 * @property integer $idFactura
 * @property string $Monto
 * @property integer $RRHH_idRRHH
 * @property integer $tiporrhh_idTipoRRHH
 * @property integer $Cliente_idCliente
 * @property string $Fecha
 * @property string $Hora
 *
 * @property Cliente $clienteIdCliente
 * @property Rrhh $rRHHIdRRHH
 * @property Tiporrhh $tiporrhhIdTipoRRHH
 */
class Factura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Monto', 'RRHH_idRRHH', 'tiporrhh_idTipoRRHH', 'Cliente_idCliente'], 'required'],
            [['Monto'], 'number'],
            [['RRHH_idRRHH', 'tiporrhh_idTipoRRHH', 'Cliente_idCliente'], 'integer'],
            [['Fecha', 'Hora'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFactura' => 'Id Factura',
            'Monto' => 'Monto',
            'RRHH_idRRHH' => 'Rrhh Id Rrhh',
            'tiporrhh_idTipoRRHH' => 'Tiporrhh Id Tipo Rrhh',
            'Cliente_idCliente' => 'Cliente Id Cliente',
            'Fecha' => 'Fecha',
            'Hora' => 'Hora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['idCliente' => 'Cliente_idCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRRHHIdRRHH()
    {
        return $this->hasOne(Rrhh::className(), ['idRRHH' => 'RRHH_idRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiporrhhIdTipoRRHH()
    {
        return $this->hasOne(Tiporrhh::className(), ['idTipoRRHH' => 'tiporrhh_idTipoRRHH']);
    }
}
