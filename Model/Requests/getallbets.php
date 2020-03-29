<?php

require('../getRequest.php'); // header, autoload, and DB connexion
// $player_post = (isset($_GET['player_post'])) ? intval($_GET['player_post']) : NULL;

$playersmanager = new PlayersManager($db); // Creation of spacemen manager
$players = $playersmanager->getList();

$totalbets = 0;

if (count($players) > 1) {
  // echo '{';
  //   // echo $spacemen[1]->name();
  //   echo '"'.$spacemen[0]->id().'" : {"id"  : "'.$spacemen[0]->id().'", "name"  : "'.$spacemen[0]->name().'", "oxy"  : "'.$spacemen[0]->oxy().'", "money"  : "'.$spacemen[0]->money().'", "date next action"  : "'.$spacemen[0]->date_next_action().'", "email"  : "'.$spacemen[0]->email().'", "password"  : "'.$spacemen[0]->password().'", "last_weather_seen_date"  : "'.$spacemen[0]->last_weather_seen_date().'", "is_performing_an_action"  : "'.$spacemen[0]->is_performing_an_action().'"}';
    
  foreach ($players as $player){
    $totalbets += $player->chips();
  }  
    //   echo '}';


echo $totalbets;

}
else {
  echo 'FAIL';
}






require('../Session/sessionDown.php'); // database connexion

