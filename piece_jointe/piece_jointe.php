<?php
 
//Pièce jointe
    if(isset($_FILES["fichier"]) &&  $_FILES['fichier']['name'] != ""){ //Vérifie sur formulaire envoyé et que le fichier existe
        $nom_fichier = $_FILES['fichier']['name'];
        $source = $_FILES['fichier']['tmp_name'];
        $type_fichier = $_FILES['fichier']['type'];
        $taille_fichier = $_FILES['fichier']['size'];
                    
        if($nom_fichier != ".htaccess"){ //Vérifie que ce n'est pas un .htaccess
			 if($type_fichier == "image/jpeg" 
                || $type_fichier == "image/pjpeg" 
                || $type_fichier == "application/pdf"){ //Soit un jpeg soit un pdf
                 
                if ($taille_fichier <= 2097152) { //Taille supérieure à Mo (en octets)
                    $tabRemplacement = array("é"=>"e", "è"=>"e", "à"=>"a"); //Remplacement des caractères spéciaux
                    
                    $handle = fopen($source, 'r'); //Ouverture du fichier
                    $content = fread($handle, $taille_fichier); //Lecture du fichier
                    $encoded_content = chunk_split(base64_encode($content)); //Encodage
                    $f = fclose($handle); //Fermeture du fichier
                                
                    $email_message .= $passage_ligne . "--" . $boundary . $passage_ligne; //Deuxième séparateur d'ouverture
                    $email_message .= 'Content-type:'.$type_fichier.';name="'.$nom_fichier.'"'."n"; //Type de contenu (application/pdf ou image/jpeg)
                    $email_message .='Content-Disposition: attachment; filename="'.$nom_fichier.'"'."n"; //Précision de pièce jointe
                    $email_message .= 'Content-transfer-encoding:base64'."n"; //Encodage
                    $email_message .= "n"; //Ligne blanche. IMPORTANT !
                    $email_message .= $encoded_content."n"; //Pièce jointe
 
                }else{
					//Message d'erreur
                    $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais celle ci était superieure à 2Mo.". $passage_ligne;
                }
            }else{
				//Message d'erreur
                $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais elle n'était pas au bon format.". $passage_ligne;
            }
        }else{
			//Message d'erreur
            $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe .htaccess.". $passage_ligne;
        }
    }
$email_message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne; //Séparateur de fermeture
?>