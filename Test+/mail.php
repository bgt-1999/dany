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

            echo "Destinataires: ".$liste."<br>";

            ini_set( 'display_errors', 1 ); 
            error_reporting( E_ALL );

            $from = "contact@amopa02.fr";

            $subject = $_GET['sujet']; 

            $message = $_GET['msg'] ." à ".$heure;
                                
            echo "Message envoyé : ".$message ;
            $headers = "From:" .$from;
            mail($liste,$subject,$message,$headers); 
        }
        // la liste des mails est constituée, on l'envoie
        
        EnvoyerMail($dest) ;
 ?>