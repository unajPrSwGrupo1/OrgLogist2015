<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estante_has_caja".
 *
 * @property integer $Estante_idEstante
 * @property integer $Caja_idCaja
 *
 * @property Caja $cajaIdCaja
 * @property Estante $estanteIdEstante
 */
class EstanteHasCaja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estante_has_caja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estante_idEstante', 'Caja_idCaja'], 'required'],
            [['Estante_idEstante', 'Caja_idCaja'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Estante_idEstante' => 'Estante Id Estante',
            'Caja_idCaja' => 'Caja Id Caja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCajaIdCaja()
    {
        return $this->hasOne(Caja::className(), ['idCaja' => 'Caja_idCaja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstanteIdEstante()
    {
        return $this->hasOne(Estante::className(), ['idEstante' => 'Estante_idEstante']);
    }
}
