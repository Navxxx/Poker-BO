<?php

require('../getRequest.php'); // header, autoload, and DB connexion
$pot_post = 1;

$potsmanager = new PotsManager($db); // Creation of spacemen manager

$pot = $potsmanager->get($pot_post);
$pot->setWindow(1);
$potsmanager->update($pot);

echo json_encode($pot);


require('../Session/sessionDown.php'); // database connexion

