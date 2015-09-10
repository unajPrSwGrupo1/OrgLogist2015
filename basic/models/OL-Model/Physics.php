<?php
namespace app\models;

use Yii;
use yii\base\Model;


/**
 * class Physics
 * Clase destinada a definir volúmenes tanto de los paquetes como de los espacios
 * de carga
 */
abstract class Physics
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  private $width = 0;

  /**
   * 
   * @access private
   */
  private $large = 0;

  /**
   * 
   * @access private
   */
  private $tall = 0;

  /**
   * peso de el elemento
   * @access private
   */
  private $weight;


  /**
   * devuelve el volumen segun se aplique
   *
   * @return int
   * @abstract
   * @access public
   */
  abstract public function getVolume();

  /**
   * método que devuelve el peso del elemento segun se aplique
   *
   * @return int
   * @abstract
   * @access public
   */
  abstract public function getWeight();

  /**
   * Devuelve el peso específico del objeto físico según sea implementado
   *
   * @return int
   * @abstract
   * @access public
   */
  abstract public function getSpecificWeight();






    /**
     * width
     * @return int
     */
    public function getWidth(){
        return $this->width;
    }

    /**
     * width
     * @param int $width
     * @return Physics
     */
    public function setWidth($width){
        $this->width = $width;
        return $this;
    }

    /**
     * large
     * @return int
     */
    public function getLarge(){
        return $this->large;
    }

    /**
     * large
     * @param int $large
     * @return Physics
     */
    public function setLarge($large){
        $this->large = $large;
        return $this;
    }

    /**
     * tall
     * @return int
     */
    public function getTall(){
        return $this->tall;
    }

    /**
     * tall
     * @param int $tall
     * @return Physics
     */
    public function setTall($tall){
        $this->tall = $tall;
        return $this;
    }

    /**
     * weight
     * @return int
     */
    public function getWeight(){
        return $this->weight;
    }

    /**
     * weight
     * @param int $weight
     * @return Physics
     */
    public function setWeight($weight){
        $this->weight = $weight;
        return $this;
    }

} // end of Physics
?>
