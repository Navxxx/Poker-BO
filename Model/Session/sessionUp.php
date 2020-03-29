<?php

// session_start() must be called AFTER THE AUTOLOAD
session_start();

// If the user clicked on deconnexion, the session is destroyed
if (isset($_GET['deconnexion']))
{
  session_destroy();
  header('Location: .');
  exit();
}

// If the session exists, the user is restored
if (isset($_SESSION['user']))
{
  $user = $_SESSION['user'];
}
