<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $idAutenticacion
 * @property string $username
 * @property string $password
 * @property string $Mail
 * @property string $Authkey
 * @property string $Token
 * @property integer $RRHH_idRRHH
 * @property integer $tiporrhh_idTipoRRHH
 * @property string $Fecha
 * @property string $Hora
 * @property integer $activate
 *
 * @property Rrhh $rRHHIdRRHH
 * @property Tiporrhh $tiporrhhIdTipoRRHH
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'Mail', 'RRHH_idRRHH', 'tiporrhh_idTipoRRHH'], 'required'],
            [['RRHH_idRRHH', 'tiporrhh_idTipoRRHH', 'activate'], 'integer'],
            [['Fecha', 'Hora'], 'safe'],
            [['username', 'Mail'], 'string', 'max' => 45],
            [['password', 'Authkey', 'Token'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAutenticacion' => 'Id Autenticacion',
            'username' => 'Username',
            'password' => 'Password',
            'Mail' => 'Mail',
            'Authkey' => 'Authkey',
            'Token' => 'Token',
            'RRHH_idRRHH' => 'Rrhh Id Rrhh',
            'tiporrhh_idTipoRRHH' => 'Tiporrhh Id Tipo Rrhh',
            'Fecha' => 'Fecha',
            'Hora' => 'Hora',
            'activate' => 'Activate',
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
}
