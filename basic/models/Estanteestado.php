<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estanteestado".
 *
 * @property integer $idEstanteEstado
 * @property string $Estado
 *
 * @property Estante[] $estantes
 */
class Estanteestado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estanteestado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estado'], 'required'],
            [['Estado'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEstanteEstado' => 'Id Estante Estado',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstantes()
    {
        return $this->hasMany(Estante::className(), ['EstanteEstado_idEstanteEstado' => 'idEstanteEstado']);
    }
}
