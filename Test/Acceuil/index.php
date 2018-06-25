<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" />
        <title>Test Amopa</title>
    </head>
    <body>
        <p>
            Voici une carte de france pour situer le département de l'Aisne lié à l'Amopa02 :<br />
        </p>
        <p>
            <map name="map_france" id="map_france">
                <area shape="poly" coords="340,63,339,104,333,115,355,148,370,128,364,116,382,113,382,93,389,85,388,70" href = "zoom_aisne.php" alt="aisne"/>
            </map>
            <center><img src="images/france_aisne.png" usemap="#map_france" alt="france_aisne" /></center>
        </p>
        <?php
        ?>
    </body>
</html>
