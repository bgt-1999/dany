<?php
    $html ="

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset='UTF-8'>
            <title></title>
        </head>
        <body>"
;

    $bdd = new PDO('mysql:host=amopafrqmdamopa.mysql.db;dbname=amopafrqmdamopa;charset=utf8', 'amopafrqmdamopa', 'Amopa02000');
    $reponse = $bdd->prepare('SELECT Nom, Prenom, Fonction, Email FROM amo02_annuaire');

    $reponse->execute();
    $nblignes = $reponse->rowCount();

    $nom_case="";
    $cpt=0;

    $html .= "
    <form method = 'GET' action = 'amopa02_2.php?nb=" . $cpt ."'>
    <table border width=100%>";

    while($data = $reponse->fetch())
    {
        $nom_case = "check".$cpt;
        $html .= "<tr><td>" . $data['Nom'] . "</td><td>" . $data['Prenom'] . "</td><td>" . $data['Fonction'] . '</td><td> <input type="checkbox" name='.$nom_case.'  value="'.$data['Email'].'"  />'.'<br /> </td> </tr>';
        $cpt = $cpt + 1;
    }

    $html .= "</table>
    <input type=hidden name=nbligne value=".$nblignes.">
    <input type = 'submit' Name = 'Valider' value='Ecrire'>
    </form>
    </body>
    </html>";

    echo $html;

