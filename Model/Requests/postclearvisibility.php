<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$card_post = (isset($_POST['card_post'])) ? intval($_POST['card_post']) : NULL;

$cardsmanager = new CardsManager($db); // Creation of spacemen manager
$cards = $cardsmanager->getList();

$newSort = [];

foreach ($cards as $card) {

    $card->clearvisibility();
    $cardsmanager->update($card);
    array_push($newSort, $card->sort());

} 

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

