<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
			['username','required','message' => 'Campo requerido'],
			['username','match','pattern' => "/^.{3,50}$/",'message' => 'Mínimo 3 y máximo 50 caracteres'],
			['username','match','pattern' => "/^[0-9a-z]+$/i",'message' => 'Sólo se aceptan letras y números'],
			['username','valid_user'],
			['password','required','message' => 'Campo requerido'],
			['password','match','pattern' => "/^.{3,50}$/",'message' => 'Mínimo 3 y máximo 50 caracteres'],
			['password','match','pattern' => "/^[0-9a-z]+$/i",'message' => 'Sólo se aceptan letras y números'],
			['password','validatePassword']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAutenticación' => 'Id Autenticación',
            'username' => 'Username',
            'password' => 'Password',
            'Mail' => 'Mail',
            'Authkey' => 'Authkey',
            'Token' => 'Token',
            'RRHH_idRRHH' => 'Rrhh Id Rrhh',
            'RRHH_TipoRRHH_idTipoRRHH' => 'Rrhh  Tipo Rrhh Id Tipo Rrhh',
            'Fecha' => 'Fecha',
            'Hora' => 'Hora',
        	'activate'=>'Activate'
        ];
    }
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
    	$table = User::find ()->where ( "password=:password", [
				":password" => $this->password
		] );
		if ($table->count () == 1){
	
			return;
		}
		else {
			$this->addError ( $attribute, "El password es erróneo" );
		}
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::find ()
            	->where ( 
            			"username=:username", 
            			[":username" => $this->username]
            			);
        }

        return $this->_user;
    }
    
    /**
     * Valida user por ajax
     *
     */
    public function valid_user($attribute, $params)
    {
    	$table = User::find ()->where ( "username=:username", 
    			[":username" => $this->username] );
    	if ($table->count () > 0){
			if($this->activ_user())return;
    	}
    	$this->addError ( $attribute, "El usuario no existe" );
    }
    
    private function activ_user(){
    	$activ = User::find ()
    		->where ("username=:username",[":username" => $this->username] )
    		->andWhere("activate=:activate",[":activate" => 1]);
    	if ($activ->count () == 1)return true;
    	else return false;
    	 
    }
    
    
}
