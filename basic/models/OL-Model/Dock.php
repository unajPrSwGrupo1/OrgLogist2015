<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/User.php';
require_once 'OL-Model/Transporter.php';
require_once 'array.php';


/**
 * class Dock
 * 
 */
abstract class Dock
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * usuario asignado a la cola
   * @access private
   */
  private $operator;

  /**
   * Cola de transportes
   * @access private
   */
  private $queueTransport = 0;

  /**
   * Ancho de la compuerta
   * @access private
   */
  private $width = 0;

  /**
   * Alto de la compuerta
   * @access private
   */
  private $tall;


  /**
   * Seteo de un nuevo operador de la compuerta
   *
   * @param OL-Model::User new_User nuevo operador de la compuerta

   * @return void
   * @access public
   */
  public function setOperator( $new_User) {
  } // end of member function setOperator

  /**
   * Devuetve el operario actual de la compuerta
   *
   * @return OL-Model::User
   * @access public
   */
  public function getOperator() {
  } // end of member function getOperator

  /**
   * Agrega un transporte a la cola de la compuerta
   *
   * @param OL-Model::Transporter new_Transporter Nueva llegada de un camión

   * @return void
   * @access public
   */
  public function addTransport( $new_Transporter) {
  } // end of member function addTransport

  /**
   * tamaño de la cola de la compuerta
   *
   * @return int
   * @access public
   */
  public function getQueuesize() {
  } // end of member function getQueuesize

  /**
   * 
   *
   * @return void
   * @access public
   */
  public function checkIn() {
  } // end of member function checkIn






    /**
     * queueTransport
     * @return int
     */
    public function getQueueTransport(){
        return $this->queueTransport;
    }

    /**
     * queueTransport
     * @param int $queueTransport
     * @return Dock
     */
    public function setQueueTransport($queueTransport){
        $this->queueTransport = $queueTransport;
        return $this;
    }

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
     * @return Dock
     */
    public function setWidth($width){
        $this->width = $width;
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
     * @return Dock
     */
    public function setTall($tall){
        $this->tall = $tall;
        return $this;
    }

} // end of Dock
?>
