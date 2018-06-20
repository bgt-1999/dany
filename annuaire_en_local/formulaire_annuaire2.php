<!DOCTYPE html>
<html>
    <head>
        <title>Amopa02</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <form method="POST" action="">
            <input type="text" name="nom" placeholder="Saisir un Nom" required><br>
            <input type="text" name="prenom" placeholder="Saisir un Prénom" required><br>
            <input type="text" name="telephone" placeholder="Saisir un N° de téléphone" required><br>
            <input type="email" name="email" placeholder="Saisir une adresse mail" required><br>
            <input type="submit" value="ajouter">
        </form>
        <?php
            try
            {
                $base = new PDO('mysql:host=localhost;dbname=amopa;charset=utf8','root','');
                
                $base ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e)
            {
                die('Erreur '.$e->getMessage());
            }
            
            if(isset($_POST["ajouter"]))
            {
                $insert = $base->prepare("INSERT INTO amo02_annuaire (Nom, Prenom, Telephone, Email) VALUES(:nom,:prenom,:telephone,:email)");
                
                $tab = array(
                    ":nom" => $_POST["nom"],
                    ":prenom" => $_POST["prenom"],
                    ":telephone" => $_POST['telephone'],
                    ":email" => $_POST["email"]
                    );
                
                
                echo ("Ajouté avec succés");
                $insert->execute($tab);
            }
        ?>
        <button><a href="http://localhost/annuaire_en_local/annuaire.php">Afficher annuaire</a></button>
        <button><a href="http://localhost/annuaire_en_local/index.php">Retour</a></button>
    </body>
</html>