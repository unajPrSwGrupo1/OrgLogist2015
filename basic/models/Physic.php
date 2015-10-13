<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "physic".
 *
 * @property integer $id
 * @property double $large
 * @property double $tall
 * @property double $width
 * @property double $maxWeight
 * @property string $descript
 * @property string $longUnit
 * @property string $weightUnit
 *
 * @property Caja[] $cajas
 */
class Physic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'physic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['large', 'tall', 'width', 'maxWeight'], 'required'],
            [['large', 'tall', 'width', 'maxWeight'], 'number'],
            [['longUnit', 'weightUnit'], 'string'],
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
            'tall' => 'Tall',
            'width' => 'Width',
            'maxWeight' => 'Max Weight',
            'descript' => 'Descript',
            'longUnit' => 'Long Unit',
            'weightUnit' => 'Weight Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCajas()
    {
        return $this->hasMany(Caja::className(), ['physic' => 'id']);
    }
}
