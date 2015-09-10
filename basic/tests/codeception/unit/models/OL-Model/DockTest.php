<?php
namespace tests\codeception\unit\models;

require_once 'OL-Model/User.php';
require_once 'OL-Model/Transporter.php';
require_once 'array.php';

use Yii;
use yii\codeception\TestCase;
use Codeception\Specify;


/**
 * class Dock
 * 
 */
abstract class DockTest extends TestCase
{

  


  /**
   * Agrega un transporte a la cola de la compuerta
   *
   * @param OL-Model::Transporter new_Transporter Nueva llegada de un camión

   * @return void
   * @access public
   */

	/**
	 * public function addTransport( $new_Transporter) {
	 */
	public function testPublicFunctionAddTransportNewTransporter()
	{
		$this->markTestIncomplete('implement me...');
	}

  } // end of member function addTransport

  /**
   * tamaño de la cola de la compuerta
   *
   * @return int
   * @access public
   */

	/**
	 * public function getQueuesize() {
	 */
	public function testPublicFunctionGetQueuesize()
	{
		$this->markTestIncomplete('implement me...');
	}

  } // end of member function getQueuesize

  /**
   * 
   *
   * @return void
   * @access public
   */

	/**
	 * public function checkIn() {
	 */
	public function testPublicFunctionCheckIn()
	{
		$this->markTestIncomplete('implement me...');
	}




  /**
   * Devuetve el operario actual de la compuerta
   *
   * @return OL-Model::User
   * @access public
   */

	/**
	 * public function getOperator(){
	 */
	public function testPublicFunctionGetOperator()
	{
		$this->markTestIncomplete('implement me...');
	}

  /**
   * Seteo de un nuevo operador de la compuerta
   *
   * @param OL-Model::User new_User nuevo operador de la compuerta

   * @return void
   * @access public
   */

	/**
	 * public function setOperator($operator){
	 */
	public function testPublicFunctionSetOperatorOperator()
	{
		$this->markTestIncomplete('implement me...');
	}

    /**
     * queueTransport
     * @return string
     */

	/**
	 * public function getQueueTransport(){
	 */
	public function testPublicFunctionGetQueueTransport()
	{
		$this->markTestIncomplete('implement me...');
	}

    /**
     * queueTransport
     * @param string $queueTransport
     * @return DockTest
     */

	/**
	 * public function setQueueTransport($queueTransport){
	 */
	public function testPublicFunctionSetQueueTransportQueueTransport()
	{
		$this->markTestIncomplete('implement me...');
	}

    /**
     * width
     * @return string
     */

	/**
	 * public function getWidth(){
	 */
	public function testPublicFunctionGetWidth()
	{
		$this->markTestIncomplete('implement me...');
	}

    /**
     * width
     * @param string $width
     * @return DockTest
     */

	/**
	 * public function setWidth($width)
	 */
	public function testPublicFunctionSetWidthWidth()
	{
		$this->markTestIncomplete('implement me...');
	}

    /**
     * tall
     * @return string
     */

	/**
	 * public function getTall()
	 */
	public function testPublicFunctionGetTall()
	{
		$this->markTestIncomplete('implement me...');
	}

    /**
     * tall
     * @param string $tall
     * @return DockTest
     */

	/**
	 * public function setTall($tall)
	 */
	public function testPublicFunctionSetTallTall()
	{
		$this->markTestIncomplete('implement me...');
	}


} // end of Dock
?>
