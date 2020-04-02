<?php
class CardsManager
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
      $q = $this->_db->query('SELECT idcard, num, family, sort, display FROM Cards WHERE idcard = '.$info);
      $data = $q->fetch(PDO::FETCH_ASSOC);
      return new Card($data);
    }
  }

 // Execute a request to get an array with all the instance of the Characters
 public function getList()
 {
   $cards = [];
   $q = $this->_db->prepare('SELECT idcard, num, family, sort, display FROM Cards ORDER BY sort');
   $q->execute();

   while ($data = $q->fetch(PDO::FETCH_ASSOC))
   {
     $cards[] = new Card($data);
   }

   return $cards;
 }

  public function update(Card $card)
  {
    // Prepare the request
    $q = $this->_db->prepare('UPDATE Cards SET 
    num = :num,
    family = :family,
    sort = :sort,
    display = :display
    WHERE idcard = :idcard');

    $q->bindValue(':idcard', $card->idcard(), PDO::PARAM_INT);
    $q->bindValue(':num', $card->num(), PDO::PARAM_STR);
    $q->bindValue(':family', $card->family(), PDO::PARAM_STR);
    $q->bindValue(':sort', $card->sort(), PDO::PARAM_INT);
    $q->bindValue(':display', $card->display(), PDO::PARAM_INT);

    // Execute the request
    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}