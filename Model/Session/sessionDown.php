<?php
// If a user is set, the user is stocked in a session variable
if (isset($user))
{
  $_SESSION['user'] = $user;
}
