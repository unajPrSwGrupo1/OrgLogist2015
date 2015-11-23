<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "loadlimit".
 *
 * @property string $id
 * @property integer $large
 * @property integer $width
 * @property integer $tall
 * @property integer $weight
 * @property string $longUnit
 * @property string $weightUnt
 * @property string $descript
 *
 * @property Estante $estante
 * @property Stagearea[] $stageareas
 * @property Transporte[] $transportes
 */
class Loadlimit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loadlimit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['large', 'width', 'tall', 'weight', 'weightUnt', 'descript'], 'required'],
            [['large', 'width', 'tall', 'weight'], 'integer'],
            [['longUnit', 'weightUnt'], 'string'],
            [['descript'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'large' => 'Large',
            'width' => 'Width',
            'tall' => 'Tall',
            'weight' => 'Weight',
            'longUnit' => 'Long Unit',
            'weightUnt' => 'Weight Unt',
            'descript' => 'Descript',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstante()
    {
        return $this->hasOne(Estante::className(), ['loadlimit' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStageareas()
    {
        return $this->hasMany(Stagearea::className(), ['loadlimit' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransportes()
    {
        return $this->hasMany(Transporte::className(), ['loadlimit' => 'id']);
    }
}
