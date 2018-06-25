<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        //hors de cet environnement, le form action s'écrira :
        //<form action="lesson=07_checkbox_mult_2.php" method="post"> 
        $sp = "&nbsp;&nbsp;&nbsp;&nbsp;" ;
        $cpt=0 ;
        //echo "<form action=selection_communes.php?exercise=selection_communes.php method=post>";
        // on se connecte Ã  MySQL
        //$db = mysqli_connect('localhost', 'root', '');
        
        $bdd = new PDO('mysql:host=localhost;dbname=amopa;charset=utf8','root','');
        $nom_case="" ;
        

        // on selectionne la base 
        //mysql_select_db('cours',$db); 

        $reponse = $bdd->prepare('SELECT Nom,Prenom,Telephone,Email FROM amo02_annuaire');
        //$reponse = $bdd->prepare('SELECT * FROM eleves');
        
        $reponse->execute() ;
        $nblignes = $reponse->rowCount() ;
        echo $nblignes."<br>";
        echo "<form action=amopa02_2.php?nb=".$cpt." method=post>";
        echo "<table border width=100%>";
        
        while($data = $reponse->fetch())
        {
            $nom_case = "check".$cpt;

            echo "<tr>";
            echo "<td>";
            echo $data[Nom];
            echo "</td>";echo "<td>";
            echo $data[Prenom];
            echo "</td>";echo "<td>";
            echo $data[Email];
            echo "</td>";echo "<td>";
            echo'<input type="checkbox" name='.$nom_case.'  value="'.$data['Email'].'"  />'.$data['Email'].'<br />';
            echo "</td>";
            echo "</tr>";
            $cpt=$cpt+1;
        }

        echo "</table>";
        echo "<input type=hidden name=nbligne value=".$nblignes.">";
        echo "<input type=submit NAME=Valider value=Ecrire >";

        // on ferme la connexion a  mysql 

        $reponse->closeCursor() ;
        //echo "<input type =submit name=login value=valider>"

        echo "</form>" ;

        /*for ($count=0;$count<count($semaine);$count++)
        {

        echo "<tr><TD >$sp<input type='checkbox' name=$semaine[$count] > 
        $semaine[$count]$sp</td></tr>";
        }

        echo "<tr><TD COLSPAN=2><input type=submit NAME=Login value=VALIDER >
        </td></tr>";
        echo "</table></form>";*/
        ?>
        <button><a href="index.php">Retour</a></button>
    </body>
</html>