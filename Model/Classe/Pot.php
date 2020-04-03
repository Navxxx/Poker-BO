<?php
class Pot implements \JsonSerializable
{
  private $_idpot, // character id
          $_amount,
          $_window;

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

  // bet function
  public function addtopot($amount)
{
    $amount = (int) $amount;
    $this->_amount += $amount;
}

public function clearpot()
{
    $this->_amount = 0;
}


  // GETTERS //
  
  public function idpot()
  {
    return $this->_idpot;
  }

  public function amount()
  {
    return $this->_amount;
  }

  public function window()
{
  return $this->_window;
}


// SETTERS
//The first letter of the attribut must be in uppercase
//For exemple, the setter of name is setName

  // The variable id is an integer
  public function setIdpot($idpot)
  {
    $idpot = (int) $idpot;

    // if ($id_user > 0)
    // {
      $this->_idpot = $idpot;
    // }
  }

  // The variable id is an integer
  public function setAmount($amount)
  {
    $amount = (int) $amount;

    // if ($id_user > 0)
    // {
      $this->_amount = $amount;
    // }
  }

    // The variable id is an integer
    public function setWindow($window)
    {
      $window = (int) $window;
  
      // if ($id_user > 0)
      // {
        $this->_window = $window;
      // }
    }

  public function jsonSerialize()
  {
      return get_object_vars($this);
  }

}