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
            <button><a href="http://localhost/annuaire_en_local/annuaire.php">Afficher annuaire</a></button>
            <button><a href="http://localhost/annuaire_en_local/index.php">Retour</a></button>
        ?>