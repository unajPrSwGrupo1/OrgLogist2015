<?php
namespace app\commands;

use yii\console\Controller;

class Intranet extends Controller{
	
	public static function getUrlHead(){
		if (isset($_SERVER['HTTP_HOST']))
			return "http://".$_SERVER['HTTP_HOST'];
		else return "http://localhost";
	}
}
?>