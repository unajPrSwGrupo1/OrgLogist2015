<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "picking".
 *
 * @property integer $num_picking
 * @property integer $idCaja
 * @property integer $idPedido
 * @property integer $cantidad_pedida
 * @property integer $cantidad_pickeada
 * @property integer $idEstante
 * @property integer $idStageArea
 */
class Picking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'picking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_picking', 'idCaja', 'idPedido', 'cantidad_pedida', 'idEstante', 'idStageArea'], 'required'],
            [['num_picking', 'idCaja', 'idPedido', 'cantidad_pedida', 'cantidad_pickeada', 'idEstante', 'idStageArea'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'num_picking' => 'Num Picking',
            'idCaja' => 'Id Caja',
            'idPedido' => 'Id Pedido',
            'cantidad_pedida' => 'Cantidad Pedida',
            'cantidad_pickeada' => 'Cantidad Pickeada',
            'idEstante' => 'Id Estante',
            'idStageArea' => 'Id Stage Area',
        ];
    }
}
