<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$cardsmanager = new CardsManager($db); // Creation of spacemen manager

// echo $player_post;



  $cards = $cardsmanager->getList();


    // $player->bet($bet_post);
    // $playersmanager->update($player);
    echo json_encode($cards);







require('../Session/sessionDown.php'); // database connexion

