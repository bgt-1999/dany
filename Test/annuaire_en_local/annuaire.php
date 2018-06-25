<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Amopa02</title>
    </head>
    <body>
        <?php
        try {
            $base = new PDO('mysql:host=localhost;dbname=amopa;charset=utf8','root','');
            
        }
        catch(exception $e) {
            die('Erreur '.$e->getMessage());
            
        }
        $base->exec("SET CHARACTER SET utf8");
        $retour = $base->query('SELECT * FROM amo02_annuaire');
        
        while ($data = $retour->fetch())
                {
                    echo $data['ID'].'. '.$data['Nom'].' '.$data['Prenom'].' '.$data['Telephone'].' '.$data['Email'].'<br>';
            
                }
        ?>
        <button><a href="http://localhost/annuaire_en_local/index.php">Retour</a></button>
    </body>
</html>
