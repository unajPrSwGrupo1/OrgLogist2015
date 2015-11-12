<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "func_tiporrhh".
 *
 * @property integer $idFunc
 * @property string $link_func
 * @property string $desc_func
 * @property integer $tiporrhh_idTipoRRHH
 *
 * @property Tiporrhh $tiporrhhIdTipoRRHH
 */
class FuncTiporrhh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'func_tiporrhh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tiporrhh_idTipoRRHH'], 'required'],
            [['tiporrhh_idTipoRRHH'], 'integer'],
            [['link_func'], 'string', 'max' => 200],
            [['desc_func'], 'string', 'max' => 140]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFunc' => 'Id Func',
            'link_func' => 'Link Func',
            'desc_func' => 'Desc Func',
            'tiporrhh_idTipoRRHH' => 'Tiporrhh Id Tipo Rrhh',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiporrhhIdTipoRRHH()
    {
        return $this->hasOne(Tiporrhh::className(), ['idTipoRRHH' => 'tiporrhh_idTipoRRHH']);
    }
}
