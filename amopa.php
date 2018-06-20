<?php
    $html =<<<HTML

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>
        <body>
HTML
;

    $bdd = new PDO('mysql:host=localhost;dbname=amopa;charset=utf8','root','');
    $reponse = $bdd->prepare('SELECT Nom,
                                    Prenom,
                                    Telephone,
                                    Email 
                                    FROM amo02_annuaire');

    $reponse->execute();
    $nbLignes = $reponse->rowCount();

    $html .= "
    <form method = 'GET' action = 'amopa02_2.php?nb=" . $cpt ."'>
    <table>";

    for($i = 0; $i < $nbLignes; $i++)
    {
        $nom_case = "check".$cpt;
        $html .= "<tr><td>" . $data[Nom] . "</td><td>" . $data[Prenom] . "</td><td>" . $data[Email] . '</td><td> <input type="checkbox" name='.$nom_case.'  value="'.$data['Email'].'"  />'.$data['Email'].'<br /> </td> </tr>';
        $cpt = $cpt + 1;
    }

    $html .= "</table>
    <input type = 'submit' Name = 'Valider' value='Ecrire'>
    </form>
    </body>
    </html>";

