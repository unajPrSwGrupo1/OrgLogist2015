<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hojaruta".
 *
 * @property integer $idHojaRuta
 * @property string $Destino
 * @property integer $cantCajas
 * @property integer $cantPallets
 * @property integer $Transporte_idTransporte
 * @property integer $Transporte_TIpoTransporte_idTIpoTransporte
 * @property integer $Transporte_RRHH_idRRHH
 * @property integer $Transporte_RRHH_TipoRRHH_idTipoRRHH
 *
 * @property Transporte $transporteIdTransporte
 */
class Hojaruta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hojaruta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Destino', 'cantCajas', 'cantPallets', 'Transporte_idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH', 'Transporte_RRHH_TipoRRHH_idTipoRRHH'], 'required'],
            [['cantCajas', 'cantPallets', 'Transporte_idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH', 'Transporte_RRHH_TipoRRHH_idTipoRRHH'], 'integer'],
            [['Destino'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idHojaRuta' => 'Id Hoja Ruta',
            'Destino' => 'Destino',
            'cantCajas' => 'Cant Cajas',
            'cantPallets' => 'Cant Pallets',
            'Transporte_idTransporte' => 'Transporte Id Transporte',
            'Transporte_TIpoTransporte_idTIpoTransporte' => 'Transporte  Tipo Transporte Id Tipo Transporte',
            'Transporte_RRHH_idRRHH' => 'Transporte  Rrhh Id Rrhh',
            'Transporte_RRHH_TipoRRHH_idTipoRRHH' => 'Transporte  Rrhh  Tipo Rrhh Id Tipo Rrhh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransporteIdTransporte()
    {
        return $this->hasOne(Transporte::className(), ['idTransporte' => 'Transporte_idTransporte', 'TIpoTransporte_idTIpoTransporte' => 'Transporte_TIpoTransporte_idTIpoTransporte', 'RRHH_idRRHH' => 'Transporte_RRHH_idRRHH', 'RRHH_TipoRRHH_idTipoRRHH' => 'Transporte_RRHH_TipoRRHH_idTipoRRHH']);
    }
}
