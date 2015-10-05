<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tiporrhh".
 *
 * @property integer $idTipoRRHH
 * @property string $Tipo
 * @property string $descript
 *
 * @property Rrhh[] $rrhhs
 */
class Tiporrhh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tiporrhh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descript'], 'required'],
            [['Tipo'], 'string', 'max' => 45],
            [['descript'], 'string', 'max' => 140]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipoRRHH' => 'Id Tipo Rrhh',
            'Tipo' => 'Tipo',
            'descript' => 'Descript',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRrhhs()
    {
        return $this->hasMany(Rrhh::className(), ['TipoRRHH_idTipoRRHH' => 'idTipoRRHH']);
    }
}
