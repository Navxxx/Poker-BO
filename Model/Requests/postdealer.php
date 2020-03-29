<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$player_post = (isset($_POST['player_post'])) ? intval($_POST['player_post']) : NULL;

$playersmanager = new PlayersManager($db); // Creation of spacemen manager
$players = $playersmanager->getList();

// echo $player_post;


if ($playersmanager->exists($_POST['player_post'])) // If the user exists, we get it
{
 
    foreach ($players as $player) {
        $player->actionstopdeal();
        $playersmanager->update($player);
    } 

    $currentplayer = $playersmanager->get($player_post);
    $currentplayer->actiondeal();
    $playersmanager->update($currentplayer);
}

else {
	echo "FAIL";
}


require('../Session/sessionDown.php'); // database connexion

