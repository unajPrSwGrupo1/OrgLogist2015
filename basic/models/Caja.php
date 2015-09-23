<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caja".
 *
 * @property integer $idCaja
 * @property integer $Peso
 * @property integer $Volumen
 * @property integer $TipoCaja_idTipoCaja
 *
 * @property Tipocaja $tipoCajaIdTipoCaja
 * @property EstanteHasCaja[] $estanteHasCajas
 * @property PalletHasCaja[] $palletHasCajas
 * @property StockcenterHasCaja[] $stockcenterHasCajas
 * @property TransporteHasCaja[] $transporteHasCajas
 */
class Caja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Peso', 'Volumen', 'TipoCaja_idTipoCaja'], 'required'],
            [['Peso', 'Volumen', 'TipoCaja_idTipoCaja'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCaja' => 'Id Caja',
            'Peso' => 'Peso',
            'Volumen' => 'Volumen',
            'TipoCaja_idTipoCaja' => 'Tipo Caja Id Tipo Caja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCajaIdTipoCaja()
    {
        return $this->hasOne(Tipocaja::className(), ['idTipoCaja' => 'TipoCaja_idTipoCaja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstanteHasCajas()
    {
        return $this->hasMany(EstanteHasCaja::className(), ['Caja_idCaja' => 'idCaja', 'Caja_TipoCaja_idTipoCaja' => 'TipoCaja_idTipoCaja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPalletHasCajas()
    {
        return $this->hasMany(PalletHasCaja::className(), ['Caja_idCaja' => 'idCaja', 'Caja_TipoCaja_idTipoCaja' => 'TipoCaja_idTipoCaja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenterHasCajas()
    {
        return $this->hasMany(StockcenterHasCaja::className(), ['Caja_idCaja' => 'idCaja', 'Caja_TipoCaja_idTipoCaja' => 'TipoCaja_idTipoCaja']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransporteHasCajas()
    {
        return $this->hasMany(TransporteHasCaja::className(), ['Caja_idCaja' => 'idCaja', 'Caja_TipoCaja_idTipoCaja' => 'TipoCaja_idTipoCaja']);
    }
}
