<?php

require('../getRequest.php'); // header, autoload, and DB connexion
$player_post = (isset($_GET['player_post'])) ? intval($_GET['player_post']) : NULL;

$playersmanager = new PlayersManager($db); // Creation of spacemen manager

$player = $playersmanager->get($player_post);

echo json_encode($player);




require('../Session/sessionDown.php'); // database connexion

