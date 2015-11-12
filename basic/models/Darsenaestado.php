<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "darsenaestado".
 *
 * @property integer $idDarsenaEstado
 * @property string $Estado
 *
 * @property Darsena[] $darsenas
 */
class Darsenaestado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'darsenaestado';
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
            'idDarsenaEstado' => 'Id Darsena Estado',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDarsenas()
    {
        return $this->hasMany(Darsena::className(), ['DarsenaEstado_idDarsenaEstado' => 'idDarsenaEstado']);
    }
}
