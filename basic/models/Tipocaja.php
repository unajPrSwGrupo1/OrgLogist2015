<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipocaja".
 *
 * @property integer $idTipoCaja
 * @property string $Tipo
 *
 * @property Caja[] $cajas
 */
class Tipocaja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipocaja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Tipo'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipoCaja' => 'Id Tipo Caja',
            'Tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCajas()
    {
        return $this->hasMany(Caja::className(), ['TipoCaja_idTipoCaja' => 'idTipoCaja']);
    }
}
