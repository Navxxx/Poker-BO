<?php
class Action implements \JsonSerializable
{
  private $_id_action, // character id
          $_name, 
          $_bottle, 
          $_money, 
          $_type, 
          $_duration;

  // We hydrate the object just after its creation
  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }

  // This function automatically hydrate the attributs according the data received
  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      // For each attributs received, a set method will be called (the setter should be written like this : "setAttribut")
      $method = 'set'.ucfirst($key);
      //
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }



  // GETTERS //
  
  public function id_action()
  {
    return $this->_id_action;
  }

  public function name()
  {
    return $this->_name;
  }

  public function bottle()
  {
    return $this->_bottle;
  }

  public function money()
  {
    return $this->_money;
  }

  public function type()
  {
    return $this->_type;
  }

  public function duration()
  {
    return $this->_duration;
  }



// SETTERS
//The first letter of the attribut must be in uppercase
//For exemple, the setter of name is setName

  // The variable id is an integer
  public function setId_action($id_action)
  {
    $id_action = (int) $id_action;

    if ($id_action > 0)
    {
      $this->_id_action = $id_action;
    }
  }

  // The variable name is a string
  public function setName($name)
  {
    if (is_string($name))
    {
      $this->_name = $name;
    }
  }
  


  // The variable bottle is an integer
  public function setBottle($bottle)
  {
    $bottle = (int) $bottle;

    if ($bottle >= 0)
    {
      $this->_bottle = $bottle;
    }
  }

    // The variable money is an integer
    public function setMoney($money)
    {
      $money = (int) $money;
  
      if ($money >= 0)
      {
        $this->_money = $money;
      }
    }


  // The variable type is a string
  public function setType($type)
  {
    if (is_string($type))
    {
      $this->_type = $type;
    }
  }

    // The variable duration is an integer
    public function setDuration($duration)
    {
        $duration = (int) $duration;

        if ($duration >= 0)
        {
            $this->_duration = $duration;
        }
    }

    public function jsonSerialize()
    {
      // return [
      //   "id" => $this->id(),
      //   "money" => $this->money()
      // ];
        return get_object_vars($this);
    }
}
