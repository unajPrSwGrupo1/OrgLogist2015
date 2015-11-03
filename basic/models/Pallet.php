<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pallet".
 *
 * @property integer $idPallet
 * @property integer $cantCajas
 * @property integer $physic
 *
 * @property Physic $physic0
 * @property PalletHasCaja[] $palletHasCajas
 * @property Caja[] $cajaIdCajas
 * @property StageareaHasPallet[] $stageareaHasPallets
 * @property TransporteHasPallet[] $transporteHasPallets
 */
class Pallet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pallet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantCajas', 'physic'], 'integer'],
            [['physic'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPallet' => 'Id Pallet',
            'cantCajas' => 'Cant Cajas',
            'physic' => 'Physic',
        ];
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
    public function getPalletHasCajas()
    {
        return $this->hasMany(PalletHasCaja::className(), ['Pallet_idPallet' => 'idPallet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCajaIdCajas()
    {
        return $this->hasMany(Caja::className(), ['idCaja' => 'Caja_idCaja'])->viaTable('pallet_has_caja', ['Pallet_idPallet' => 'idPallet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStageareaHasPallets()
    {
        return $this->hasMany(StageareaHasPallet::className(), ['Pallet_idPallet' => 'idPallet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransporteHasPallets()
    {
        return $this->hasMany(TransporteHasPallet::className(), ['Pallet_idPallet' => 'idPallet']);
    }
}
