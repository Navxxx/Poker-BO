<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$playersmanager = new PlayersManager($db); // Creation of spacemen manager

$players = $playersmanager->getList();

if (count($players) > 1) {
  // echo '{';
  //   // echo $spacemen[1]->name();
  //   echo '"'.$spacemen[0]->id().'" : {"id"  : "'.$spacemen[0]->id().'", "name"  : "'.$spacemen[0]->name().'", "oxy"  : "'.$spacemen[0]->oxy().'", "money"  : "'.$spacemen[0]->money().'", "date next action"  : "'.$spacemen[0]->date_next_action().'", "email"  : "'.$spacemen[0]->email().'", "password"  : "'.$spacemen[0]->password().'", "last_weather_seen_date"  : "'.$spacemen[0]->last_weather_seen_date().'", "is_performing_an_action"  : "'.$spacemen[0]->is_performing_an_action().'"}';
    
  //   for ($i = 1; $i < count($spacemen); $i++)
  //   {
  //     echo ',"'.$spacemen[$i]->id().'" : {"id"  : "'.$spacemen[$i]->id().'", "name"  : "'.$spacemen[$i]->name().'", "oxy"  : "'.$spacemen[$i]->oxy().'", "money"  : "'.$spacemen[$i]->money().'", "date next action"  : "'.$spacemen[$i]->date_next_action().'", "email"  : "'.$spacemen[$i]->email().'", "password"  : "'.$spacemen[$i]->password().'", "last_weather_seen_date"  : "'.$spacemen[$i]->last_weather_seen_date().'", "is_performing_an_action"  : "'.$spacemen[$i]->is_performing_an_action().'"}';
  //   }
  //   echo '}';

  echo json_encode($players);

}
else {
  echo 'FAIL';
}



require('../Session/sessionDown.php'); // database connexion

