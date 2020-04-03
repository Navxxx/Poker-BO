<?php
class PotsManager
{
  private $_db; // Instance of PDO

  // After the creation of the character manager, we hydrate de database
  public function __construct($db)
  {
    $this->setDb($db);
  }

  // Execute a request to get an object Character hydrated with all the data in the db (id, progression, action_progression ...)
  public function get($info)
  {
    // if the parameter is an integer, it's considered as an id and return an object Character
    if (is_int($info))
    {
      $q = $this->_db->query('SELECT idpot, amount, window FROM Pots WHERE idpot = '.$info);
      $data = $q->fetch(PDO::FETCH_ASSOC);
      return new Pot($data);
    }
  }

  public function update(Pot $pot)
  {
    // Prepare the request
    $q = $this->_db->prepare('UPDATE Pots SET 
    amount = :amount,
    window = :window
    WHERE idpot = :idpot');

    $q->bindValue(':idpot', $pot->idpot(), PDO::PARAM_INT);
    $q->bindValue(':amount', $pot->amount(), PDO::PARAM_INT);
    $q->bindValue(':window', $pot->window(), PDO::PARAM_INT);


    // Execute the request
    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}