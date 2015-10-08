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
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
    	$table = User::find ()
    	->where ( "password=:password", 
    			[":password" => crypt($this->password, Yii::$app->params["salt"])] )
    	->andWhere("username=:username", [":username" => $this->username]);
		if ($table->count () == 1)return;
		else $this->addError ( $attribute, "El password es erróneo" );
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
    	if ($this->getUser()->count () > 0 && $this->activ_user())return ;
    	else $this->addError ( $attribute, "El usuario no existe" );
    }
    
    /**
     * @return boolean true si el usuario existe y está activo
     */
    private function activ_user(){
    	$user = User::find ()
    		->where ("username=:username",[":username" => $this->username] )
    		->andWhere("activate=:activate",[":activate" => 1]);
    	if ($user->count () == 1)return true;
    	else return false;
    	 
    }
    
    /**
     * Relaciona el username del login con su rol id de la tabla user
     * @param string $username
     * @return RRHH_TipoRRHH_idTipoRRHH de la tabla user
     */
    private function getIdTipoRRHH($username){
    	return User::findOne(['username'=>$username])->RRHH_TipoRRHH_idTipoRRHH;
    }
    
    /**
     * Relaciona el username del login con su rol Tipo de la tabla tiporrhh y renderiza a la página de en construcción en
     * el caso que no exista el Tipo o la vista.
     * 
     * @param string $username provisto en el login
     * @return string el campo Tipo de la tabla tiporrhh correspondiente a username
     */
    public function getRole($username){
    	$role=Tiporrhh::find()->where("idTipoRRHH=:idTipoRRHH",[":idTipoRRHH" => $this->getIdTipoRRHH($username)]);
    	$filename=Tiporrhh::findOne(['idTipoRRHH'=>$this->getIdTipoRRHH($username)])->Tipo;
    	if($role->count()==0||!file_exists(__DIR__ . '/../views/site/'.$filename.'.php'))return "not_has_view";
    	else return $filename;
    }
    /**
     * Relaciona el username del login con su rol Tipo de la tabla tiporrhh y renderiza a la página de en construcción en
     * el caso que no exista el Tipo o la vista.
     *
     * @param string $username provisto en el login
     * @return string el campo descript de la tabla tiporrhh correspondiente a username
     */
    public function getDescriptRole($username){
    	$role=Tiporrhh::find()->where("idTipoRRHH=:idTipoRRHH",[":idTipoRRHH" => $this->getIdTipoRRHH($username)]);
    	if($role->count()==0||!file_exists(__DIR__ . '/../views/site/'.$this->getRole($username).'.php'))return "usuario";
    	else return Tiporrhh::findOne(['idTipoRRHH'=>$this->getIdTipoRRHH($username)])->descript;;
    }
    
}
