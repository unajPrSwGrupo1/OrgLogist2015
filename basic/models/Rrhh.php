<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rrhh".
 *
 * @property integer $idRRHH
 * @property string $Nombre
 * @property string $Apellido
 * @property integer $Edad
 * @property string $Salario
 * @property integer $Jefe
 * @property integer $TipoRRHH_idTipoRRHH
 *
 * @property Autenticación[] $autenticacións
 * @property Factura[] $facturas
 * @property Pedido[] $pedidos
 * @property Tiporrhh $tipoRRHHIdTipoRRHH
 * @property Stockcenter[] $stockcenters
 * @property Ticket[] $tickets
 * @property Transporte[] $transportes
 */
class Rrhh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rrhh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Apellido', 'Edad', 'Salario', 'TipoRRHH_idTipoRRHH'], 'required'],
            [['Edad', 'Jefe', 'TipoRRHH_idTipoRRHH'], 'integer'],
            [['Salario'], 'number'],
            [['Nombre', 'Apellido'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRRHH' => 'Id Rrhh',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Edad' => 'Edad',
            'Salario' => 'Salario',
            'Jefe' => 'Jefe',
            'TipoRRHH_idTipoRRHH' => 'Tipo Rrhh Id Tipo Rrhh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutenticacións()
    {
        return $this->hasMany(Autenticación::className(), ['RRHH_idRRHH' => 'idRRHH', 'RRHH_TipoRRHH_idTipoRRHH' => 'TipoRRHH_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['RRHH_idRRHH' => 'idRRHH', 'RRHH_TipoRRHH_idTipoRRHH' => 'TipoRRHH_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['RRHH_idRRHH' => 'idRRHH', 'RRHH_TipoRRHH_idTipoRRHH' => 'TipoRRHH_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoRRHHIdTipoRRHH()
    {
        return $this->hasOne(Tiporrhh::className(), ['idTipoRRHH' => 'TipoRRHH_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenters()
    {
        return $this->hasMany(Stockcenter::className(), ['RRHH_idRRHH' => 'idRRHH', 'RRHH_TipoRRHH_idTipoRRHH' => 'TipoRRHH_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['RRHH_idRRHH' => 'idRRHH', 'RRHH_TipoRRHH_idTipoRRHH' => 'TipoRRHH_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportes()
    {
        return $this->hasMany(Transporte::className(), ['RRHH_idRRHH' => 'idRRHH', 'RRHH_TipoRRHH_idTipoRRHH' => 'TipoRRHH_idTipoRRHH']);
    }
}
