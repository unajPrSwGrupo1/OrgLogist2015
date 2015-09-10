<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/Physics.php';
require_once 'OL-Model/Shelves.php';
require_once 'OL-Model/User.php';
require_once 'OL-Model/Chronometer.php';
require_once 'OL-Model/StageArea.php';


/**
 * class StockCenter
 * 
 */
class StockCenter extends Physics
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * lugares de almacenamiento
   * @access private
   */
  private $boxes;

  /**
   * encargado del depósito
   * @access private
   */
  private $stocker;

  /**
   * 
   * @access private
   */
  private $timerUpdate;

  /**
   * 
   * @access private
   */
  private $area;







    /**
     * boxes
     * @return int
     */
    public function getBoxes(){
        return $this->boxes;
    }

    /**
     * boxes
     * @param int $boxes
     * @return StockCenter
     */
    public function setBoxes($boxes){
        $this->boxes = $boxes;
        return $this;
    }

    /**
     * stocker
     * @return int
     */
    public function getStocker(){
        return $this->stocker;
    }

    /**
     * stocker
     * @param int $stocker
     * @return StockCenter
     */
    public function setStocker($stocker){
        $this->stocker = $stocker;
        return $this;
    }

    /**
     * timerUpdate
     * @return int
     */
    public function getTimerUpdate(){
        return $this->timerUpdate;
    }

    /**
     * timerUpdate
     * @param int $timerUpdate
     * @return StockCenter
     */
    public function setTimerUpdate($timerUpdate){
        $this->timerUpdate = $timerUpdate;
        return $this;
    }

    /**
     * area
     * @return int
     */
    public function getArea(){
        return $this->area;
    }

    /**
     * area
     * @param int $area
     * @return StockCenter
     */
    public function setArea($area){
        $this->area = $area;
        return $this;
    }

} // end of StockCenter
?>
