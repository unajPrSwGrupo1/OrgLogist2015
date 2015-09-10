<?php
namespace app\models;

use Yii;
use yii\base\Model;

require_once 'OL-Model/JobFunction.php';
require_once 'array.php';
require_once 'OL-Model/JF-Driver.php';


/**
 * class JF_ADM_Transp
 * Clase que implementa el comportamiento del administrador de transporte
 */
class JF_ADM_Transp extends JobFunction
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * Genera una Hoja de ruta para un chofer que producirá un envío devuelve un array
   * con los datos de la hoja de ruta generada o null si no se pudo lograr
   *
   * @param OL-Model::JF-Driver one_Driver El chofer que producirá el envío, en el transporte que tiene asignado

   * @return array
   * @access public
   */
  public function newRoutePaper( $one_Driver) {
  } // end of member function newRoutePaper





} // end of JF_ADM_Transp
?>
