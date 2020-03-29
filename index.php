<?php

// Initialisation
require('Model/autoload.php'); // class autoading
require('Model/dbconnexion.php'); // database connexion
$playersmanager = new PlayersManager($db); // Creation of spacemen manager

?>


<fieldset>
  <legend>Currently <?= $playersmanager->count() ?> spacemen on Krytpon : </legend>
  <p>

  <?php
      // $users = $usersmanager->getList();
      // foreach ($user as $users)
      // {
      //   echo '<b>', htmlspecialchars($spaceman->name()),'</b></br>';
      // }
  ?>
  </p>
</fieldset>
