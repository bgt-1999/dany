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

    
    
    $fonc = $_GET['fonc'];
    $bdd = new PDO('mysql:host=amopafrqmdamopa.mysql.db;dbname=amopafrqmdamopa;charset=utf8', 'amopafrqmdamopa', 'Amopa02000');
    $reponse = $bdd->prepare('SELECT Nom, Prenom, Fonction, Email FROM amo02_annuaire WHERE Fonction = :fonction');

    $reponse->execute(array(':fonction' => $fonc));
    $nblignes = $reponse->rowCount();

    $nom_case="";
    $cpt=0;
    
    $html .= "
    <form method='GET' action='amopa0.php'>
    <p>
       <label for='fonc'>Quels fonctions ?</label><br />
       <select name='fonc'' id='fonc'>
           <option value='Stagiaire'>Stagiaire</option>
           <option value='Membre du bureau'>Membre du bureau</option>
           <option value='Adhérent/Sympathisant'>Adhérent/Sympathisant</option>
           <option value='Contributeur'>Contributeur</option>
       </select>
   </p>
   <input type='submit' value='Envoyer' />
   </form>
    "

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

