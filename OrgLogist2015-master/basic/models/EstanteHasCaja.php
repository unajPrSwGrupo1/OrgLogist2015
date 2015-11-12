<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estante_has_caja".
 *
 * @property integer $Estante_idEstante
 * @property integer $Estante_EstanteEstado_idEstanteEstado
 * @property integer $Caja_idCaja
 * @property integer $Caja_TipoCaja_idTipoCaja
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
            [['Estante_idEstante', 'Estante_EstanteEstado_idEstanteEstado', 'Caja_idCaja', 'Caja_TipoCaja_idTipoCaja'], 'required'],
            [['Estante_idEstante', 'Estante_EstanteEstado_idEstanteEstado', 'Caja_idCaja', 'Caja_TipoCaja_idTipoCaja'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Estante_idEstante' => 'Estante Id Estante',
            'Estante_EstanteEstado_idEstanteEstado' => 'Estante  Estante Estado Id Estante Estado',
            'Caja_idCaja' => 'Caja Id Caja',
            'Caja_TipoCaja_idTipoCaja' => 'Caja  Tipo Caja Id Tipo Caja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCajaIdCaja()
    {
        return $this->hasOne(Caja::className(), ['idCaja' => 'Caja_idCaja', 'TipoCaja_idTipoCaja' => 'Caja_TipoCaja_idTipoCaja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstanteIdEstante()
    {
        return $this->hasOne(Estante::className(), ['idEstante' => 'Estante_idEstante', 'EstanteEstado_idEstanteEstado' => 'Estante_EstanteEstado_idEstanteEstado']);
    }
}
