<?php

require('../getRequest.php'); // header, autoload, and DB connexion


// $pot_post = (isset($_POST['pot_post'])) ? intval($_POST['pot_post']) : NULL;
$pot_post = 1;

$potsmanager = new PotsManager($db); // Creation of spacemen manager

$pot = $potsmanager->get($pot_post);
$pot->clearpot();
$potsmanager->update($pot);

echo json_encode($pot);




require('../Session/sessionDown.php'); // database connexion

