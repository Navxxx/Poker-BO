<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$name_get = (isset($_GET['name_get'])) ? strval($_GET['name_get']) : NULL;
$password_get = (isset($_GET['password_get'])) ? strval($_GET['password_get']) : NULL;


$playersmanager = new PlayersManager($db); // Creation of spacemen manager

// echo $player_post;


$playerId = $playersmanager->checkId($name_get, $password_get);
// echo $playerId;
echo json_encode($playerId);


require('../Session/sessionDown.php'); // database connexion

