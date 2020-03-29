<?php
class ActionsManager
{
  private $_db; // Instance of PDO

  // After the creation of the character manager, we hydrate de database
  public function __construct($db)
  {
    $this->setDb($db);
  }

  // Execute a count request and return the number of spacemen
  public function count()
  {
    return $this->_db->query('SELECT COUNT(*) FROM Action')->fetchColumn();
  }

  // Execute a request to delete the character
  public function delete(Action $action)
  {
    $this->_db->exec('DELETE FROM Action WHERE id_action = '.$action->id_action());
  }

  // Execute a request to test if the character exists
  public function exists($info)
  {
    return (bool) $this->_db->query('SELECT COUNT(*) FROM Action WHERE id_action = '.$info)->fetchColumn();
  }

  // Execute a request to get an array with all the instance of the Characters
  public function getList()
  {
    $actions = [];
    $q = $this->_db->prepare('SELECT id_action, name, bottle, money, type, duration FROM Action ORDER BY id_action');
    $q->execute();

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $actions[] = new Action($data);
    }

    return $actions;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
