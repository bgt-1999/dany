<!DOCTYPE html>
<?php

$controle ="";
$destinataire;
$liste_destinataires="";
$dest=$_GET['dest'];

function EnvoyerMail($d)
{
    $heure = date("H:i");
    $liste = substr($d,1);

    echo "j'envoie un mail a ".$liste." <br>";

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );

    $from = "contact@amopa02.fr";
    $subject = "un mail de test du site AMOPA";
    $message = "mail du site de l'amopa envoye a :".$heure;
    $pj = $_GET['fichier'];

    $message.= "Content-Type: $pj; name=\"$pj\"";
    $message.= "Content-Transfer-Encoding: base64";
    $message.= "Content-Disposition: filename=\"$pj\"";

    echo "message envoye : ".$message ;
    $headers = "From:" .$from;

    mail($liste,$subject,$message, $headers); 

}
    	// la liste des mails est constituée, on l'envoie
        
    	EnvoyerMail($dest) ;
 ?>