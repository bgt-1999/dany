<?php

	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    $stmt = $bdd->prepare(<<<SQL
          INSERT INTO MEMBRE (name, username, email)
          VALUES(?, ?, ?);
SQL
      ) ;

    $stmt->execute(array($_POST['name'], $_POST['username'], $_POST['email']);


