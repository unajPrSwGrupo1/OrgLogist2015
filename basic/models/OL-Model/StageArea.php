<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/Physics.php';
require_once 'OL-Model/Chronometer.php';
require_once 'array.php';


/**
 * class StageArea
 * Clase que define el área de Stay del StockCenter
 */
class StageArea extends Physics
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * 
   * @access private
   */
  private $st_timer;

  /**
   * 
   * @access private
   */
  private $staying;


  /**
   * 
   *
   * @return int
   * @access public
   */
  public function getAvailVolume() {
  } // end of member function getAvailVolume





} // end of StageArea
?>
