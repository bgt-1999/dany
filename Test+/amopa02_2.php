<!DOCTYPE html>
<?php

    	$controle ="";
    	$destinataire;
    	$liste_destinataires="";
        $nb = $_GET['nbligne'];
        
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
    			$liste_destinataires.= ';';
    			$liste_destinataires .= $destinataire ;      
    		}

            $destinataire = null;
    	}

        $html="
            <form action= 'mail.php' method='GET' enctype='multipart/form-data'>
            
                <input type='text' name='sujet' placeholder='Sujet du mail' required><br><br>
                <textarea name='msg' rows='20' cols='60' placeholder='Vous pouvez écrire votre message'></textarea><br>
                <label for='fichier'>Ajouter une pièce jointe</label>
                <input type='file' name='fichier' id='fichier'>
                <input type=hidden name=dest value=".$liste_destinataires.">
                <input type = 'submit' name = 'Envoyer' value='Envoyer'>
                
            </form>
            <button><a href='index.php'>Retour</a></button>
                
";
        echo $html;
    	?>
    </body>
</html>