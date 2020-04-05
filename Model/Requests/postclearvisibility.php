<?php

require('../getRequest.php'); // header, autoload, and DB connexion
header("Access-Control-Allow-Origin: *");

$card_post = (isset($_POST['card_post'])) ? intval($_POST['card_post']) : NULL;

$cardsmanager = new CardsManager($db); // Creation of spacemen manager
$cards = $cardsmanager->getList();


foreach ($cards as $card) {

    $card->clearvisibility();
    $cardsmanager->update($card);

} 

require('../Session/sessionDown.php'); // database connexion

