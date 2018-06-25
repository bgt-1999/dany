<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Amopa02</title>
    </head>
    <body>
        <?php
        try {
            $base = new PDO('mysql:host=amopafrqmdamopa.mysql.db;dbname=amopafrqmdamopa;charset=utf8', 'amopafrqmdamopa', 'Amopa02000');
            
        }
        catch(exception $e) {
            die('Erreur '.$e->getMessage());
            
        }
        $base->exec("SET CHARACTER SET utf8");
        $retour = $base->query('SELECT * FROM amo02_annuaire');
        
        while ($data = $retour->fetch())
                {
                    echo $data['ID'].'. '.$data['Nom'].' '.$data['Prenom'].' '.$data['Fonction'].' '.$data['Telephone'].' '.$data['Email'].'<br>';
            
                }
        ?>
        <button><a href="http://amopa02.fr/Annuaire/index.php">Retour</a></button>
    </body>
</html>
