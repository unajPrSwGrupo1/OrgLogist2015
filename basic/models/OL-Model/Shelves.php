<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/Physics.php';
require_once 'OL-Model/Pack.php';


/**
 * class Shelves
 * 
 */
class Shelves extends Physics
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * elemento de la matriz
   * @access private
   */
  private $element;







    /**
     * element
     * @return int
     */
    public function getElement(){
        return $this->element;
    }

    /**
     * element
     * @param int $element
     * @return Shelves
     */
    public function setElement($element){
        $this->element = $element;
        return $this;
    }

} // end of Shelves
?>
