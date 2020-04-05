<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$bet_post = (isset($_POST['bet_post'])) ? intval($_POST['bet_post']) : NULL;
$player_post = (isset($_POST['player_post'])) ? intval($_POST['player_post']) : NULL;

$playersmanager = new PlayersManager($db); // Creation of spacemen manager

// echo $player_post;


if ($playersmanager->exists($_POST['player_post'])) // If the user exists, we get it
{
  $player = $playersmanager->get($player_post);

//   echo '<br> User '.$player->name().' had '.$player->chips().' chips';
//   $user->looseOxy($oxy_post);
    $player->bet($bet_post);
    $player->actionunfold();
    $playersmanager->update($player);
//   $spacemen_manager->update($user);
//   echo '<br> Now, user '.$player->name().'f has '.$player->chips().' chips';



}

else {
	echo "FAIL";
}


require('../Session/sessionDown.php'); // database connexion

