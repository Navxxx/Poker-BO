<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$cardsmanager = new CardsManager($db); // Creation of spacemen manager

// echo $player_post;



  $cards = $cardsmanager->getList();

  $newSort = [];

  foreach ($cards as $card) {


    array_push($newSort, $card->sort());
    // $cardsmanager->update($card);

  } 

    // $player->bet($bet_post);
    // $playersmanager->update($player);
    shuffle($newSort);
    // echo json_encode($newSort);

    $i =0;
    foreach ($cards as $card) {


      $card->setSort($newSort[$i]);
      $cardsmanager->update($card);
      $i++;
  
    } 




require('../Session/sessionDown.php'); // database connexion

