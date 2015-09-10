<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/JobFunction.php';
require_once 'array.php';


/**
 * class JF_OP_SalePoint
 * 
 */
class JF_OP_SalePoint extends JobFunction
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * devuelve true si generó una factura con un envío de productos basado en el
   * pedido del cliente o false si no pudo hacerlo
   *
   * @param array one_Demand arreglo con los datos de los datos de referencia de los paquetes pedios

   * @return bool
   * @access public
   */
  public function newOrder( $one_Demand) {
  } // end of member function newOrder





} // end of JF_OP_SalePoint
?>
