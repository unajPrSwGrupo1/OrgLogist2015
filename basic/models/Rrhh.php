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
 * @property string $descript
 *
 * @property Factura[] $facturas
 * @property Pedido[] $pedidos
 * @property Stockcenter[] $stockcenters
 * @property Ticket[] $tickets
 * @property Transporte[] $transportes
 * @property User[] $users
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
            [['Nombre', 'Apellido', 'Edad', 'Salario','activate'], 'required'],
            [['Edad', 'Jefe','activate'], 'integer'],
            [['Salario'], 'number'],
	    ['Salario','valid_sal'],
            [['Nombre', 'Apellido'], 'string', 'max' => 45],
	    [['descript'], 'string', 'max' => 140]
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
            'descript' => 'Descript',
	    'activate' => 'Activate',
        ];
    }


    public function valid_sal($attribute, $params)
    {
    	if ($this->Salario<9999999999.99&&$this->Salario>0)return ;
    	else $this->addError ( $attribute, "Salario incorrecto" );
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['RRHH_idRRHH' => 'idRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['RRHH_idRRHH' => 'idRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenters()
    {
        return $this->hasMany(Stockcenter::className(), ['RRHH_idRRHH' => 'idRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['RRHH_idRRHH' => 'idRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportes()
    {
        return $this->hasMany(Transporte::className(), ['RRHH_idRRHH' => 'idRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['RRHH_idRRHH' => 'idRRHH']);
    }


    public function getAllRrhh(){
        return Rrhh::find()->where ( 
            		"activate=:activate", 
            		[":activate" => 1]
            	)->all();
    }

    public function getAllRrhhZeroActivate(){
        return Rrhh::find()->where ( 
            		"activate=:activate", 
            		[":activate" => 0]
            	)->all();
    }

}
