
<?php

include(__DIR__."/../admin/access_dp.php");
// $db = new PDO('mysql:host='.HOST_DB.';dbname='.USE_DB.';charset=utf8', USER_DB, MDP_DB);
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.


/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname='.USE_DB.';host='.HOST_DB;
$user = USER_DB;
$password = MDP_DB;

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

