<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$player_post = (isset($_POST['player_post'])) ? intval($_POST['player_post']) : NULL;

$playersmanager = new PlayersManager($db); // Creation of spacemen manager

// echo $player_post;


if ($playersmanager->exists($_POST['player_post'])) // If the user exists, we get it
{

    $currentplayer = $playersmanager->get($player_post);

    // fold
    $currentplayer->actionunfold();

    $playersmanager->update($currentplayer);
}

else {
	echo "FAIL";
}


require('../Session/sessionDown.php'); // database connexion

