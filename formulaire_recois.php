<?php
    try
    {
        $base = new PDO('mysql:host=amopafrqmdamopa.mysql.db;dbname=amopafrqmdamopa;charset=utf8', 'amopafrqmdamopa', 'Amopa02000');
                
         $base ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        die('Erreur '.$e->getMessage());
    }
            
    $insert = $base->prepare("INSERT INTO amo02_annuaire (Nom, Prenom, Telephone, Email) VALUES(:nom,:prenom,:telephone,:email)");
                
    $tab = array(
        ":nom" => $_POST["nom"],
        ":prenom" => $_POST["prenom"],
        ":telephone" => $_POST['telephone'],
        ":email" => $_POST["email"]
        );
                
                
    echo ("Ajouté avec succés");
    $insert->execute($tab);
?>