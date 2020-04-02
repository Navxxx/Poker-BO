<?php

require('../getRequest.php'); // header, autoload, and DB connexion

$card_post = (isset($_POST['card_post'])) ? intval($_POST['card_post']) : NULL;

$cardsmanager = new CardsManager($db); // Creation of spacemen manager


$card = $cardsmanager->get($card_post);

$card->togglevisibility();
$cardsmanager->update($card);

require('../Session/sessionDown.php'); // database connexion

