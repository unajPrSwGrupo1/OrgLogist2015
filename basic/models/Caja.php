<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caja".
 *
 * @property integer $idCaja
 * @property integer $TipoCaja_idTipoCaja
 * @property integer $physic
 *
 * @property Tipocaja $tipoCajaIdTipoCaja
 * @property Physic $physic0
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
            [['TipoCaja_idTipoCaja', 'physic'], 'required'],
            [['TipoCaja_idTipoCaja', 'physic'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCaja' => 'Id Caja',
            'TipoCaja_idTipoCaja' => 'Tipo Caja Id Tipo Caja',
            'physic' => 'Physic',
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
    public function getPhysic0()
    {
        return $this->hasOne(Physic::className(), ['id' => 'physic']);
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
