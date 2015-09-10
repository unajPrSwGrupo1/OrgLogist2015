<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/JobFunction.php';
require_once 'array.php';


/**
 * class JF_Driver
 * Comportamiento del chofer
 */
class JF_Driver extends JobFunction  //WARNING: PHP5 does not support multiple inheritance but there is more than 1 superclass defined in your UML model!
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * Devuelve la consulta de la hoja de ruta asignada por US-ADM-Transp
   *
   * @return array
   * @access public
   */
  public function getRoutePaper() {
  } // end of member function getRoutePaper

  /**
   * Devuelve un array con la consulta del ticket del checkIn o null si no lo tiene
   * asignado
   *
   * @return array
   * @access public
   */
  public function getCheckInTicket() {
  } // end of member function getCheckInTicket

  /**
   * Devuelve en un array la consulta del ticket de salida o null si no lo tiene
   * asignado
   *
   * @return array
   * @access public
   */
  public function getDispatchTicket() {
  } // end of member function getDispatchTicket





} // end of JF_Driver
?>
