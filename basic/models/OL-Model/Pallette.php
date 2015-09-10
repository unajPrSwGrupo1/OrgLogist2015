<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/Physics.php';
require_once 'OL-Model/Pack.php';


/**
 * class Pallette
 * 
 */
class Pallette extends Physics
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * elemento del pallete
   * @access private
   */
  private $elem;







    /**
     * elem
     * @return int
     */
    public function getElem(){
        return $this->elem;
    }

    /**
     * elem
     * @param int $elem
     * @return Pallette
     */
    public function setElem($elem){
        $this->elem = $elem;
        return $this;
    }

} // end of Pallette
?>
