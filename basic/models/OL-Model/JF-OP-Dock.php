<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/JobFunction.php';
require_once 'array.php';
require_once 'OL-Model/Dock.php';


/**
 * class JF_OP_Dock
 * Implementación del comportamiento del usuario operario de stock
 */
class JF_OP_Dock extends JobFunction
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * Devuelve un array con la consulta del ticket generado o null si no lo generó. Si
   * la dársena es de entrada, es un checkin ticket, si es de salida en un dispatch
   * ticket
   *
   * @param OL-Model::Dock one_Dock Dársena asignada al operario de dársena.

   * @return array
   * @access public
   */
  public function newTicket( $one_Dock) {
  } // end of member function newTicket





} // end of JF_OP_Dock
?>
