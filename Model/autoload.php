<?php
//  header("Access-Control-Allow-Origin: *");
 header(" Access-Control-Allow-Origin: https://t3r3nc3.netlify.com ");

function chargerClasse($classe)
{
  //require 'Classe/' .$classe . '.php'; // On inclut la classe correspondante au paramètre passé.
  if (strpos($classe, 'Manager') !== false) {
    require 'Manager/' .$classe . '.php';
  }
  else {
    require 'Classe/' .$classe . '.php';
  } 

}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
