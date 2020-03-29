<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$usersitnumber = (isset($_GET['usersitnumber'])) ? $_GET['usersitnumber'] : NULL;
$playersmanager = new PlayersManager($db); // Creation of spacemen manager

$players = $playersmanager->getListOrdered($usersitnumber);

if (count($players) >= 1) {

  echo json_encode($players);

}
else {
  echo 'FAIL';
}



require('../Session/sessionDown.php'); // database connexion

