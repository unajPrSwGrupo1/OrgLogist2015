<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiporrhh".
 *
 * @property integer $idTipoRRHH
 * @property string $Tipo
 * @property string $descript
 *
 * @property Factura[] $facturas
 * @property FuncTiporrhh[] $funcTiporrhhs
 * @property Pedido[] $pedidos
 * @property Stockcenter[] $stockcenters
 * @property Ticket[] $tickets
 * @property Transporte[] $transportes
 * @property User[] $users
 */
class Tiporrhh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiporrhh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descript'], 'required'],
            [['Tipo'], 'string', 'max' => 45],
            [['descript'], 'string', 'max' => 140]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipoRRHH' => 'Id Tipo Rrhh',
            'Tipo' => 'Tipo',
            'descript' => 'Descript',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['tiporrhh_idTipoRRHH' => 'idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncTiporrhhs()
    {
        return $this->hasMany(FuncTiporrhh::className(), ['tiporrhh_idTipoRRHH' => 'idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['tiporrhh_idTipoRRHH' => 'idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenters()
    {
        return $this->hasMany(Stockcenter::className(), ['tiporrhh_idTipoRRHH' => 'idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['tiporrhh_idTipoRRHH' => 'idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportes()
    {
        return $this->hasMany(Transporte::className(), ['tiporrhh_idTipoRRHH' => 'idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['tiporrhh_idTipoRRHH' => 'idTipoRRHH']);
    }
}
