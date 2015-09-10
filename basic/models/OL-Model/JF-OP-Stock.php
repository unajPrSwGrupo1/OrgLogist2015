<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/JobFunction.php';
require_once 'array.php';
require_once 'OL-Model/Pallette.php';
require_once 'OL-Model/StockCenter.php';


/**
 * class JF_OP_Stock
 * Implementación del comportamiento de usuario operador de stock
 */
class JF_OP_Stock extends JobFunction
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * retorna true si pudo incrementar un pack mas del arreglo y lo elimina del
   * arreglo one_Order sino lo logra retorna false
   *
   * @param array one_Order Arreglo de productos que se van descontando deacuerdo al picking realizado

   * @param OL-Model::Pallette one_Pallete Pallet que se va llenando con el picking

   * @param int one_Selection Orden del pickin elegido por el operario

   * @param OL-Model::StockCenter one_StockCenter Almacén de donde obtiene los packs

   * @return bool
   * @access public
   */
  public function picking( $one_Order,  $one_Pallete,  $one_Selection,  $one_StockCenter) {
  } // end of member function picking

  /**
   * devuelve el arreglo del pedido que tiene asignado para el picking o null si no
   * tiene asignado ningun pedido
   *
   * @return array
   * @access public
   */
  public function getOrder() {
  } // end of member function getOrder

  /**
   * Devuelve la consulta de la reposición que tiene asignada o null si no tiene
   * reposición asignada
   *
   * @return array
   * @access public
   */
  public function getReplacement() {
  } // end of member function getReplacement

  /**
   * devuelve true si se logró decrementar el contenido del pallete y se acomodó el
   * pack seleccionado de la lista por el operario y false si no pudo
   *
   * @param OL-Model::Pallette one_Pallete Pallette ubicado en StageArea

   * @param array one_Replacement Consulta de los packs de reposición del pallette asignado para acomodar que se
irá decrementando deacuerdo al accomodation

   * @param int one_sellection 

   * @return bool
   * @access public
   */
  public function getReceiptStep( $one_Pallete,  $one_Replacement,  $one_sellection) {
  } // end of member function getReceiptStep





} // end of JF_OP_Stock
?>
