<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pallet_has_caja".
 *
 * @property integer $Pallet_idPallet
 * @property integer $Caja_idCaja
 * @property string $descript
 *
 * @property Caja $cajaIdCaja
 * @property Pallet $palletIdPallet
 */
class PalletHasCaja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pallet_has_caja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Pallet_idPallet', 'Caja_idCaja', 'descript'], 'required'],
            [['Pallet_idPallet', 'Caja_idCaja'], 'integer'],
            [['descript'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Pallet_idPallet' => 'Pallet Id Pallet',
            'Caja_idCaja' => 'Caja Id Caja',
            'descript' => 'Descript',
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
    public function getPalletIdPallet()
    {
        return $this->hasOne(Pallet::className(), ['idPallet' => 'Pallet_idPallet']);
    }
}
