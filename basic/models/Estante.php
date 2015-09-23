<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estante".
 *
 * @property integer $idEstante
 * @property string $Fila
 * @property string $Columna
 * @property integer $EstanteEstado_idEstanteEstado
 *
 * @property Estanteestado $estanteEstadoIdEstanteEstado
 * @property EstanteHasCaja[] $estanteHasCajas
 * @property StockcenterHasEstante[] $stockcenterHasEstantes
 */
class Estante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fila', 'Columna', 'EstanteEstado_idEstanteEstado'], 'required'],
            [['EstanteEstado_idEstanteEstado'], 'integer'],
            [['Fila', 'Columna'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEstante' => 'Id Estante',
            'Fila' => 'Fila',
            'Columna' => 'Columna',
            'EstanteEstado_idEstanteEstado' => 'Estante Estado Id Estante Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstanteEstadoIdEstanteEstado()
    {
        return $this->hasOne(Estanteestado::className(), ['idEstanteEstado' => 'EstanteEstado_idEstanteEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstanteHasCajas()
    {
        return $this->hasMany(EstanteHasCaja::className(), ['Estante_idEstante' => 'idEstante', 'Estante_EstanteEstado_idEstanteEstado' => 'EstanteEstado_idEstanteEstado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockcenterHasEstantes()
    {
        return $this->hasMany(StockcenterHasEstante::className(), ['Estante_idEstante' => 'idEstante', 'Estante_EstanteEstado_idEstanteEstado' => 'EstanteEstado_idEstanteEstado']);
    }
}
