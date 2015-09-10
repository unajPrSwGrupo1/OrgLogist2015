<?php

namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/Physics.php';
require_once 'OL-Model/User.php';
require_once 'OL-Model/Chronometer.php';


/**
 * class Transporter
 * 
 */
class Transporter extends Physics
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * encargado del transporte
   * @access private
   */
  private $driver;

  /**
   * 
   * @access private
   */
  private $timerLoadUnload;







    /**
     * driver
     * @return int
     */
    public function getDriver(){
        return $this->driver;
    }

    /**
     * driver
     * @param int $driver
     * @return Transporter
     */
    public function setDriver($driver){
        $this->driver = $driver;
        return $this;
    }

    /**
     * timerLoadUnload
     * @return int
     */
    public function getTimerLoadUnload(){
        return $this->timerLoadUnload;
    }

    /**
     * timerLoadUnload
     * @param int $timerLoadUnload
     * @return Transporter
     */
    public function setTimerLoadUnload($timerLoadUnload){
        $this->timerLoadUnload = $timerLoadUnload;
        return $this;
    }

} // end of Transporter
?>
