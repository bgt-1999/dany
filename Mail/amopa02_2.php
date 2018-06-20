<!DOCTYPE html>
    <?php
    
    $controle ="";
    $destinataire;
    $liste_destinataires="";

    function EnvoyerMail($dest)
    {
        $from = "contact@amopa02.fr";
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $from)) // On filtre les serveurs qui rencontrent des bogues.
        {
            $passage_ligne = "\r\n";
        }
        else
        {
            $passage_ligne = "\n";
        }

    	$heure = date("H:i");
    	$liste = substr($dest,1);
        $boundary = "-----=".md5(rand());
        
        $sujet = "Mail du site de l'AMOPA02";
        
        $header = "From:" .$from .$passage_ligne;
        $header.= "Reply-to: \"D.M\" <dany.meurice1@gmail.com>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        
    	echo "j'envoie un mail a ".$liste." <br>";

    	ini_set( 'display_errors', 1 ); 
    	error_reporting( E_ALL );

    	$message = "mail du site de l'amopa envoye a :".$heure;
    	echo "message envoye : ".$message ;
    	mail($liste,$sujet,$message, $header); 
    }

    echo "<br>nombre de cases cochables :";
        
    $osef = $_GET['nbligne'];
    echo $osef."<br><br>";
    
    for ($count=0;$count<$osef;$count++)
    {
    	$controle="check".$count;
    	echo $controle."<br>";
    	$destinataire = $_POST[$controle] ; // $controle vaut check suivi du numero de la ligne

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
