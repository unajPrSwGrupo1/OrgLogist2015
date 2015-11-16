<?php
namespace app\commands;

use yii\console\Controller;

class Mailto extends Controller{
	
    /**
     * Redacta un nuevo correo electrónico por parámetros url
     * @param email $dest destnatario del email
     * @param string $subject asunto del email
     * @param email $cc destinatario de copia 
     * @param email $bcc destinatario de copia blindada
     * @param string $body cuerpo del mensaje
     * @param string $link enlace de confirmación 
     * @param integer $nameLink nombre del enlace mailto
     * @return enlace a mailto completo
     */
public static function getUrlMailto($dest,$subject,$cc,$bcc,$body,$link,$nameLink){
		$subject = urlencode($subject);
        $msg=urlencode($body);
        $link=urlencode($link);
        $str = "<li><a href='mailto:";
        $str .= $dest;
        $str .= "?subject=".$subject;
        $str .= "&cc=".$cc;
        $str .= "&bcc=".$bcc;
        $str .= "&body=".$msg;
        $str .= " ".$link.".";
        $str .= "'> ".$nameLink." </a></li>";

        return $str;
	}
}
?>