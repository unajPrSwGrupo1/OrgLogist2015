<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $idCliente
 * @property string $Nombre
 * @property string $Telefono
 * @property string $Mail
 * @property string $Direccion
 * @property string $Descripcion
 *
 * @property Factura[] $facturas
 * @property Pedido[] $pedidos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Telefono', 'Direccion', 'Descripcion'], 'string', 'max' => 45],
            [['Mail'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCliente' => 'Id Cliente',
            'Nombre' => 'Nombre',
            'Telefono' => 'Telefono',
            'Mail' => 'Mail',
            'Direccion' => 'Direccion',
            'Descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['Cliente_idCliente' => 'idCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['Cliente_idCliente' => 'idCliente']);
    }
}
