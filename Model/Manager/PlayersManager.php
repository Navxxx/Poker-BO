<?php
class PlayersManager
{
  private $_db; // Instance of PDO

  // After the creation of the character manager, we hydrate de database
  public function __construct($db)
  {
    $this->setDb($db);
  }

  //Execute a count request and return the number of spacemen
  public function count()
  {
    return $this->_db->query('SELECT COUNT(*) FROM Players')->fetchColumn();
  }

  // Execute a request to delete the character
  // public function delete(Action $action)
  // {
  //   $this->_db->exec('DELETE FROM Action WHERE id_action = '.$action->id_action());
  // }

  // Execute a request to test if the character exists
  public function exists($info)
  {
    return (bool) $this->_db->query('SELECT COUNT(*) FROM Players WHERE iduser = '.$info)->fetchColumn();
  }


    // Execute a request to get an object Character hydrated with all the data in the db (id, progression, action_progression ...)
    public function get($info)
    {
      // if the parameter is an integer, it's considered as an id and return an object Character
      if (is_int($info))
      {
        $q = $this->_db->query('SELECT iduser, name, sitnumber, cash, dealer, fold, chips, gain FROM Players WHERE iduser = '.$info);
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return new Player($data);
      }
    }
  
    // Execute a request to get an object Character hydrated with all the data in the db (id, progression, action_progression ...)
    public function checkId($userName, $password )
    {
      if (is_string($userName) AND is_string($password))
      {
        // Prepare the request
        $q = $this->_db->prepare('SELECT iduser, name, sitnumber, cash, dealer, fold, chips, gain FROM Players
        WHERE name = :name AND password = :password');

        $q->bindValue(':name', $userName, PDO::PARAM_STR);
        $q->bindValue(':password', $password, PDO::PARAM_STR);

        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
      }
      //////
      // if the parameter is an integer, it's considered as an id and return an object Character
      // if (is_string($userName))
      // {
        // $q = $this->_db->query('SELECT iduser, name, sitnumber, cash, dealer, fold, chips FROM Players WHERE name = '.$userName);
        // $data = $q->fetch(PDO::FETCH_ASSOC);
        // return new Player($data);
      // }
    }

  // Execute a request to get an array with all the instance of the Characters
  public function getList()
  {
    $players = [];
    $q = $this->_db->prepare('SELECT iduser, name, sitnumber, cash, dealer, fold, chips, gain FROM Players ORDER BY iduser');
    $q->execute();

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $players[] = new Player($data);
    }

    return $players;
  }

  public function getListOrdered($usersitnumber)
  {
    $players = [];
    // user
    $q = $this->_db->prepare('SELECT iduser, name, sitnumber, cash, dealer, fold, chips, gain FROM Players WHERE sitnumber = '.$usersitnumber.' ORDER BY iduser ');
    $q->execute();

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $players[] = new Player($data);
    }

    // players after the user
    $q = $this->_db->prepare('SELECT iduser, name, sitnumber, cash, dealer, fold, chips, gain FROM Players WHERE sitnumber > '.$usersitnumber.' ORDER BY iduser ');
    $q->execute();

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $players[] = new Player($data);
    }

    // players before the user
    $q = $this->_db->prepare('SELECT iduser, name, sitnumber, cash, dealer, fold, chips, gain FROM Players WHERE sitnumber < '.$usersitnumber.' ORDER BY iduser ');
    $q->execute();

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $players[] = new Player($data);
    }

    return $players;
  }

  public function getDealer()
  {
    $players = [];
    $q = $this->_db->prepare('SELECT iduser, name, sitnumber, cash, dealer, fold, chips, gain FROM Players WHERE dealer = 1 LIMIT 1');
    $q->execute();

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $players[] = new Player($data);
    }

    return $players;
  }

  public function update(Player $player)
  {
    // Prepare the request
    $q = $this->_db->prepare('UPDATE Players SET 
    cash = :cash,
    dealer = :dealer,
    fold = :fold,
    chips = :chips,
    gain = :gain
    WHERE iduser = :iduser');

    $q->bindValue(':iduser', $player->iduser(), PDO::PARAM_INT);
    $q->bindValue(':cash', $player->cash(), PDO::PARAM_STR);
    $q->bindValue(':dealer', $player->dealer(), PDO::PARAM_INT);
    $q->bindValue(':fold', $player->fold(), PDO::PARAM_INT);
    $q->bindValue(':chips', $player->chips(), PDO::PARAM_INT);
    $q->bindValue(':gain', $player->gain(), PDO::PARAM_INT);

    // Execute the request
    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
