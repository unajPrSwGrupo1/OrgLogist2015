<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stockcenter".
 *
 * @property integer $idStockCenter
 * @property integer $CantEstantes
 * @property integer $RRHH_idRRHH
 * @property integer $tiporrhh_idTipoRRHH
 *
 * @property Rrhh $rRHHIdRRHH
 * @property Tiporrhh $tiporrhhIdTipoRRHH
 * @property StockcenterHasCaja[] $stockcenterHasCajas
 * @property StockcenterHasDarsena[] $stockcenterHasDarsenas
 * @property StockcenterHasEstante[] $stockcenterHasEstantes
 * @property StockcenterHasStagearea[] $stockcenterHasStageareas
 */
class Stockcenter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stockcenter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CantEstantes', 'RRHH_idRRHH', 'tiporrhh_idTipoRRHH'], 'required'],
            [['CantEstantes', 'RRHH_idRRHH', 'tiporrhh_idTipoRRHH'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idStockCenter' => 'Id Stock Center',
            'CantEstantes' => 'Cant Estantes',
            'RRHH_idRRHH' => 'Rrhh Id Rrhh',
            'tiporrhh_idTipoRRHH' => 'Tiporrhh Id Tipo Rrhh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRRHHIdRRHH()
    {
        return $this->hasOne(Rrhh::className(), ['idRRHH' => 'RRHH_idRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiporrhhIdTipoRRHH()
    {
        return $this->hasOne(Tiporrhh::className(), ['idTipoRRHH' => 'tiporrhh_idTipoRRHH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenterHasCajas()
    {
        return $this->hasMany(StockcenterHasCaja::className(), ['StockCenter_idStockCenter' => 'idStockCenter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenterHasDarsenas()
    {
        return $this->hasMany(StockcenterHasDarsena::className(), ['StockCenter_idStockCenter' => 'idStockCenter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenterHasEstantes()
    {
        return $this->hasMany(StockcenterHasEstante::className(), ['StockCenter_idStockCenter' => 'idStockCenter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenterHasStageareas()
    {
        return $this->hasMany(StockcenterHasStagearea::className(), ['StockCenter_idStockCenter' => 'idStockCenter']);
    }
}
