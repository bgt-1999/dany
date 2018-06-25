<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php  
        $sp = "&nbsp;&nbsp;&nbsp;&nbsp;" ;
        $cpt=0;
        
        $bdd = new PDO('mysql:host=localhost;dbname=amopa;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        $nom_case="" ;
       
        $reponse = $bdd->prepare('SELECT Nom,Prenom,Telephone,Email FROM amo02_annuaire');
        $reponse->execute();
        
        $nblignes = $reponse->rowCount();
        echo $nblignes."<br>";
        
        echo "<form action=amopa02_2.php?nb=".$cpt."method=post>";
        echo "<table border width=100%>";
        
        while($data = $reponse->fetch())
        {
            $nom_case = "check".$cpt;

            echo "<tr>";
            echo "<td>";
            echo $data["Nom"];
            echo "</td>";echo "<td>";
            echo $data["Prenom"];
            echo "</td>";echo "<td>";
            echo $data["Email"];
            echo "</td>";echo "<td>";
            echo'<input type="checkbox" name='.$nom_case.'  value="'.$data['Email'].'"  />'.$data['Email'].'<br />';
            echo "</td>";
            echo "</tr>";
            $cpt=$cpt+1;
        }

        echo "</table>";
        echo "<input type=hidden name=nbligne value=".$nblignes.">";
        echo "<input type=submit name=Valider value=Ecrire >";

        // on ferme la connexion a  mysql
        $reponse->closeCursor() ;
        
        //echo "<input type =submit name=login value=valider>"

        echo "</form>" ;
        ?>
        <button><a href="index.php">Retour</a></button>
    </body>
</html>