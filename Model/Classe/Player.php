<?php
class Player implements \JsonSerializable
{
  private $_iduser, // character id
          $_name, 
          $_sitnumber, 
          $_cash, 
          $_dealer, 
          $_fold,
          $_chips,
          $_gain;

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
  public function bet($amount)
  { 
    $this->_chips = $amount;
  }

  // fold function
  public function actionfold()
  { 
    $this->_fold = 1;
  }

  // unfold function
  public function actionunfold()
  { 
    $this->_fold = 0;
  }

  // become dealer function
  public function actiondeal()
  { 
    $this->_dealer = 1;
  }

  // stop dealing function
  public function actionstopdeal()
  { 
    $this->_dealer = 0;
  }


  //
  public function susbtractbettocash()
  {

    $this->_cash -= $this->_chips;
  }

  // actiongain function
  public function actiongain($amount)
  { 
    $this->_gain = $amount;
  }
  
  // clear gain function
  public function cleargain()
  { 
    $this->_gain = 0;
  }

  // GETTERS //
  
  public function iduser()
  {
    return $this->_iduser;
  }

  public function name()
  {
    return $this->_name;
  }

  public function sitnumber()
  {
    return $this->_sitnumber;
  }

  public function cash()
  {
    return $this->_cash;
  }

  public function dealer()
  {
    return $this->_dealer;
  }

  public function fold()
  {
    return $this->_fold;
  }

  public function chips()
  {
    return $this->_chips;
  }

  public function gain()
  {
    return $this->_gain;
  }

// SETTERS
//The first letter of the attribut must be in uppercase
//For exemple, the setter of name is setName

  // The variable id is an integer
  public function setIduser($iduser)
  {
    $iduser = (int) $iduser;

    if ($iduser > 0)
    {
      $this->_iduser = $iduser;
    }
  }

  public function setName($name)
  {

    // if ($id_user > 0)
    // {
      $this->_name = $name;
    // }
  }

  public function setSitnumber($sitnumber)
  {
    $sitnumber = (int) $sitnumber;

    // if ($id_user > 0)
    // {
      $this->_sitnumber = $sitnumber;
    // }
  }

  public function setCash($cash)
  {
    $cash = (int) $cash;

    // if ($id_user > 0)
    // {
      $this->_cash = $cash;
    // }
  }

  // The variable id is an integer
  public function setDealer($dealer)
  {
    $dealer = (int) $dealer;

    // if ($id_user > 0)
    // {
      $this->_dealer = $dealer;
    // }
  }

  public function setFold($fold)
  {
    $fold = (int) $fold;

    // if ($id_user > 0)
    // {
      $this->_fold = $fold;
    // }
  }

  public function setChips($chips)
  {
    $chips = (int) $chips;

    // if ($id_user > 0)
    // {
      $this->_chips = $chips;
    // }
  }

  public function setGain($gain)
  {
    $gain = (int) $gain;
    $this->_gain = $gain;
  }

  public function jsonSerialize()
  {
      return get_object_vars($this);
  }

}