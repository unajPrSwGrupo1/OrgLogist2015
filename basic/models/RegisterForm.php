<?php
namespace app\models;
use Yii;
use yii\base\Model;
use app\models\User;
class RegisterForm extends Model{

	public $username;
	public $Mail;
	public $password;
	public $password_repeat;
	public $RRHH_idRRHH;
	public $tiporrhh_idTipoRRHH;

	public function rules()
	{
	return [
		[['username', 'Mail', 'password','password_repeat','RRHH_idRRHH','tiporrhh_idTipoRRHH'], 'required', 'message' => 'Campo requerido'],
		[['RRHH_idRRHH','tiporrhh_idTipoRRHH'], 'integer'],
		['username', 'match', 'pattern' => "/^.{3,50}$/",'message' => 'Mínimo 3 y máximo 50 caracteres'],
		['username', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
		['username', 'username_existe'],
		['Mail', 'match', 'pattern' => "/^.{5,80}$/",'message' => 'Mínimo 5 y máximo 80 caracteres'],
		['Mail', 'email', 'message' => 'Formato no válido'],
		['Mail', 'email_existe'],
		['password', 'match', 'pattern' => "/^.{8,16}$/",'message' => 'Mínimo 6 y máximo 16 caracteres'],
		['password_repeat', 'compare', 'compareAttribute'=> 'password', 'message' => 'Los passwords no coinciden'],
		];
	}

	public function email_existe($attribute, $params)
	{
		$table = User::find()->where("Mail=:Mail",[":Mail" =>$this->Mail]);
		$aux1 = $table->count();			
		if ($table->count() >0)
			{	
				$table=null;
				$table = User::find()->where("Mail=:Mail",[":Mail" =>$this->Mail])->andwhere("RRHH_idRRHH=:RRHH_idRRHH",[":RRHH_idRRHH"=>$this->RRHH_idRRHH]);
				if($table->count()!=$aux1)
				$this->addError($attribute, "El email seleccionado no es individual");
			}
	}

	public function username_existe($attribute, $params)	{
		$table = User::find()->where("username=:username",[":username" =>$this->username]);
		if ($table->count() == 1)$this->addError($attribute, "El usuario selecbionado existe");
	}
}