<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/User.php';
require_once 'OL-Model/JobFunction.php';


/**
 * class User
 * Clase que define los atributos del usuario
 */
class User
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * Nombre del usuario
   * @access private
   */
  private $name;

  /**
   * id interno
   * @access private
   */
  private $id;

  /**
   * apellido del usuario
   * @access private
   */
  private $last_name;

  /**
   * fecha de nacimiento del usuario
   * @access private
   */
  private $fechNac;

  /**
   * foto del usuario
   * @access private
   */
  private $foto;

  /**
   * superior inmediato
   * @access private
   */
  private $boss;

  /**
   * apuntador a la clase del comportamiento
   * @access private
   */
  private $role;







    /**
     * name
     * @return int
     */
    public function getName(){
        return $this->name;
    }

    /**
     * name
     * @param int $name
     * @return User
     */
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    /**
     * id
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * id
     * @param int $id
     * @return User
     */
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * last_name
     * @return int
     */
    public function getLast_name(){
        return $this->last_name;
    }

    /**
     * last_name
     * @param int $last_name
     * @return User
     */
    public function setLast_name($last_name){
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * fechNac
     * @return int
     */
    public function getFechNac(){
        return $this->fechNac;
    }

    /**
     * fechNac
     * @param int $fechNac
     * @return User
     */
    public function setFechNac($fechNac){
        $this->fechNac = $fechNac;
        return $this;
    }

    /**
     * foto
     * @return int
     */
    public function getFoto(){
        return $this->foto;
    }

    /**
     * foto
     * @param int $foto
     * @return User
     */
    public function setFoto($foto){
        $this->foto = $foto;
        return $this;
    }

    /**
     * boss
     * @return int
     */
    public function getBoss(){
        return $this->boss;
    }

    /**
     * boss
     * @param int $boss
     * @return User
     */
    public function setBoss($boss){
        $this->boss = $boss;
        return $this;
    }

    /**
     * role
     * @return int
     */
    public function getRole(){
        return $this->role;
    }

    /**
     * role
     * @param int $role
     * @return User
     */
    public function setRole($role){
        $this->role = $role;
        return $this;
    }

} // end of User
?>
