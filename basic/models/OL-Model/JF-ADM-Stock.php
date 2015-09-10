<?php

namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/JobFunction.php';
require_once 'array.php';
require_once 'OL-Model/JF-OP-Stock.php';
require_once 'OL-Model/StockCenter.php';
require_once 'OL-Model/Pallette.php';


/**
 * class JF_ADM_Stock
 * Implementación del comportamiento usuario administrador de stock
 */
class JF_ADM_Stock extends JobFunction
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * devuelve la consulta del Picking generado o null si no se pudo lograr
   *
   * @param OL-Model::JF-OP-Stock one_Op_Stock Operario que estará a cargo del picking

   * @param OL-Model::StockCenter one_StockCenter Almacén donde se encuentran los pack

   * @param array one_Order consulta del pedido recibido por OP-ADM-Stock

   * @return array
   * @access public
   */
  public function newPicking( $one_Op_Stock,  $one_StockCenter,  $one_Order) {
  } // end of member function newPicking

  /**
   * devuelve un array de string con la consulta generada por la creación de un nuevo
   * accomodation o null si no lo pudo realizar
   *
   * @param OL-Model::JF-OP-Stock one_Op_Stock Operario de stock a cargo del accomodation

   * @param OL-Model::Pallette one_Pallette Pallette origen de la reposición

   * @param array one_Replacement array de la lista que tiene los productos que tendrían que estar segun lo indica
US-ADM-Stock y que irá decreciendo con cada accomodation

   * @param int one_Selection selección del actual accomodation que se realizará segun el OP-Stock

   * @return array
   * @access public
   */
  public function newReceipt( $one_Op_Stock,  $one_Pallette,  $one_Replacement,  $one_Selection) {
  } // end of member function newReceipt





} // end of JF_ADM_Stock
?>
