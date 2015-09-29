<?php

namespace app\models;

use Yii;
use app\models\UserSearch;

/**
 * This is the model class for table "user".
 *
 * @property integer $idAutenticación
 * @property string $Usuario
 * @property string $Password
 * @property string $Mail
 * @property string $Authkey
 * @property string $Token
 * @property integer $RRHH_idRRHH
 * @property integer $RRHH_TipoRRHH_idTipoRRHH
 * @property string $Fecha
 * @property string $Hora
 *
 * @property Rrhh $rRHHIdRRHH
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
     * @return \yii\db\ActiveQuery
     */
    public function getRRHHIdRRHH()
    {
        return $this->hasOne(Rrhh::className(), ['idRRHH' => 'RRHH_idRRHH', 'TipoRRHH_idTipoRRHH' => 'RRHH_TipoRRHH_idTipoRRHH']);
    }

	

}
