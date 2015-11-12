<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recepcion".
 *
 * @property integer $idRecepcion
 * @property integer $idFactura
 * @property integer $idCaja
 * @property integer $cantidad_esperada
 * @property integer $cantidad_recibida
 * @property integer $idEstante
 */
class Recepcion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recepcion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRecepcion', 'idFactura', 'idCaja', 'cantidad_esperada'], 'required'],
            [['idRecepcion', 'idFactura', 'idCaja', 'cantidad_esperada', 'cantidad_recibida', 'idEstante'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRecepcion' => 'Id Recepcion',
            'idFactura' => 'Id Factura',
            'idCaja' => 'Id Caja',
            'cantidad_esperada' => 'Cantidad Esperada',
            'cantidad_recibida' => 'Cantidad Recibida',
            'idEstante' => 'Id Estante',
        ];
    }
}
