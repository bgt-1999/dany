<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

    	<?php

    	$controle ="";
    	$destinataire;
    	$liste_destinataires="";

    	function EnvoyerMail($dest)
    	{

    		$heure = date("H:i");
    		$liste = substr($dest,1);

    		echo "j'envoie un mail a ".$liste." <br>";

    		ini_set( 'display_errors', 1 ); 
    		error_reporting( E_ALL );

    		$from = "contact@amopa02.fr";

    		$subject = "un mail de test du site AMOPA"; 

    		$message = "mail du site de l'amopa envoye a :".$heure;
    		echo "message envoye : ".$message ;
    		$headers = "From:" . $from; 
    		mail($liste,$subject,$message, $headers); 
    	}

    	echo "<br>nombre de cases cochables :";
    	echo $_GET['nbligne']."<br><br>";

    	for ($count=0;$count<$_GET['nbligne'];$count++)
    	{
    		$controle= $_GET['check'.$count];
    		echo $controle."<br>";
    		$destinataire = $controle; // $controle vaut check suivi du numero de la ligne

    		if (isset($destinataire)) // la case est-elle cochée ?
    		{
    			echo "case ".$count." cochee : ".$destinataire."<br/>";
    			$liste_destinataires.= ',' ;
    			$liste_destinataires .= $destinataire ;      
    		}
    	}

    	// la liste des mails est constituée, on l'envoie
    	EnvoyerMail($liste_destinataires) ;
    	?>
    	<button><a href="index.php">Retour</a></button>
    </body>
</html>