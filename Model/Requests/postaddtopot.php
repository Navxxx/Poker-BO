<?php

require('../getRequest.php'); // header, autoload, and DB connexion


// $amount_post = (isset($_POST['amount_post'])) ? intval($_POST['amount_post']) : NULL;
// $pot_post = (isset($_POST['pot_post'])) ? intval($_POST['pot_post']) : NULL;
$pot_post = 1;

$potsmanager = new PotsManager($db); // Creation of spacemen manager

$playersmanager = new PlayersManager($db); // Creation of spacemen manager
$players = $playersmanager->getList();

// Get all Bet

$totalbets = 0;

if (count($players) > 1) {
  // echo '{';
  //   // echo $spacemen[1]->name();
  //   echo '"'.$spacemen[0]->id().'" : {"id"  : "'.$spacemen[0]->id().'", "name"  : "'.$spacemen[0]->name().'", "oxy"  : "'.$spacemen[0]->oxy().'", "money"  : "'.$spacemen[0]->money().'", "date next action"  : "'.$spacemen[0]->date_next_action().'", "email"  : "'.$spacemen[0]->email().'", "password"  : "'.$spacemen[0]->password().'", "last_weather_seen_date"  : "'.$spacemen[0]->last_weather_seen_date().'", "is_performing_an_action"  : "'.$spacemen[0]->is_performing_an_action().'"}';
    
  foreach ($players as $player){
    $totalbets += $player->chips();
  }  
    //   echo '}';


// echo $totalbets;
}

// Clear all Bet
 
    foreach ($players as $player) {
        $player->susbtractbettocash($player->chips());
        $player->bet(0);
        // $player->actionunfold();
        $playersmanager->update($player);
    } 


// Adding amount to the pot
$pot = $potsmanager->get($pot_post);
$pot->addtopot($totalbets);
$potsmanager->update($pot);

echo json_encode($pot);




require('../Session/sessionDown.php'); // database connexion

