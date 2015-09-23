<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "darsena".
 *
 * @property integer $idDarsena
 * @property string $Nombre
 * @property string $Descripcion
 * @property integer $DarsenaEstado_idDarsenaEstado
 *
 * @property Darsenaestado $darsenaEstadoIdDarsenaEstado
 * @property StockcenterHasDarsena[] $stockcenterHasDarsenas
 */
class Darsena extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'darsena';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DarsenaEstado_idDarsenaEstado'], 'required'],
            [['DarsenaEstado_idDarsenaEstado'], 'integer'],
            [['Nombre'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDarsena' => 'Id Darsena',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'DarsenaEstado_idDarsenaEstado' => 'Darsena Estado Id Darsena Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDarsenaEstadoIdDarsenaEstado()
    {
        return $this->hasOne(Darsenaestado::className(), ['idDarsenaEstado' => 'DarsenaEstado_idDarsenaEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenterHasDarsenas()
    {
        return $this->hasMany(StockcenterHasDarsena::className(), ['Darsena_idDarsena' => 'idDarsena', 'Darsena_DarsenaEstado_idDarsenaEstado' => 'DarsenaEstado_idDarsenaEstado']);
    }
}
