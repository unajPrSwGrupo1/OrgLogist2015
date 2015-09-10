<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/User.php';


/**
 * class JobFunction
 * Definición del comportamiento del puesto
 */
abstract class JobFunction
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * Devuelve un array con la consulta generada por el update de la tabla de
   * estadística o null si no lo logró
   *
   * @param OL-Model::User One_Usr Usuario que produce el update

   * @return void
   * @abstract
   * @access public
   */
  abstract public function startJob( $One_Usr);

  /**
   * Devuelve un array con la consulta generada por el update de la tabla de
   * estadística o null si no lo logró
   *
   * @param OL-Model::User One_Usr Usuario que produce el update

   * @return void
   * @abstract
   * @access public
   */
  abstract public function pauseJob( $One_Usr);

  /**
   * Devuelve un array con la consulta generada por el update de la tabla de
   * estadística o null si no lo logró
   *
   * @param OL-Model::User One_Usr Usuario que produce el update

   * @return void
   * @access public
   */
  public function stopJob( $One_Usr) {
  } // end of member function stopJob





} // end of JobFunction
?>
