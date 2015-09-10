<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/StageArea.php';
require_once 'array.php';


/**
 * class ST_Ingress
 * Clase que implementa la entrada al área de stay
 */
class ST_Ingress extends StageArea
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * 
   *
   * @param array one_Charge 

   * @return void
   * @access public
   */
  public function addStay( $one_Charge) {
  } // end of member function addStay

  /**
   * 
   *
   * @return array
   * @access public
   */
  public function loadStockCenter() {
  } // end of member function loadStockCenter





} // end of ST_Ingress
?>
