<?php

require('../getRequest.php'); // header, autoload, and DB connexion


// $amount_post = (isset($_POST['amount_post'])) ? intval($_POST['amount_post']) : NULL;
// $pot_post = (isset($_POST['pot_post'])) ? intval($_POST['pot_post']) : NULL;
$pot_post = 1;

$potsmanager = new PotsManager($db); // Creation of spacemen manager

$playersmanager = new PlayersManager($db); // Creation of spacemen manager
$players = $playersmanager->getList();


if (count($players) > 1) {

 
    foreach ($players as $player) {
        $player->cleargain();
        $playersmanager->update($player);
    } 


  }




require('../Session/sessionDown.php'); // database connexion

