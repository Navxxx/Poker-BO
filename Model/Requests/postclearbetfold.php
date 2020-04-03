<?php

require('../getRequest.php'); // header, autoload, and DB connexion

// $bet_post = (isset($_POST['bet_post'])) ? intval($_POST['bet_post']) : NULL;
// $player_post = (isset($_POST['player_post'])) ? intval($_POST['player_post']) : NULL;

$playersmanager = new PlayersManager($db); // Creation of spacemen manager

// echo $player_post;
$players = $playersmanager->getList();


if (count($players) > 1) {

 
  foreach ($players as $player) {
      $player->actionunfold();
      $player->bet(0);
      $playersmanager->update($player);
  } 


}


require('../Session/sessionDown.php'); // database connexion

