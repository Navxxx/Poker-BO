<?php
class Card implements \JsonSerializable
{
  private $_idcard, // character id
          $_num, 
          $_family, 
          $_sort, 
          $_display;

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

  public function togglevisibility() {

    if($this->_display === 1 ){
      $this->setDisplay(0);
    } 
    else {
      $this->setDisplay(1);
    }

  }

  public function clearvisibility() {

    $this->setDisplay(0);

  }

  // GETTERS //
  
  public function idcard()
  {
    return $this->_idcard;
  }

  public function num()
  {
    return $this->_num;
  }

  public function family()
  {
    return $this->_family;
  }

  public function sort()
  {
    return $this->_sort;
  }

  public function display()
  {
    return $this->_display;
  }


// SETTERS
//The first letter of the attribut must be in uppercase
//For exemple, the setter of name is setName

  // The variable id is an integer
  public function setIdcard($idcard)
  {
    $idcard = (int) $idcard;

    if ($idcard > 0)
    {
      $this->_idcard = $idcard;
    }
  }

  public function setNum($num)
  {

    // if ($id_user > 0)
    // {
      $this->_num = $num;
    // }
  }

  public function setFamily($family)
  {

    // if ($id_user > 0)
    // {
      $this->_family = $family;
    // }
  }

  public function setSort($sort)
  {
    $sort = (int) $sort;

    // if ($id_user > 0)
    // {
      $this->_sort = $sort;
    // }
  }

  // The variable id is an integer
  public function setDisplay($display)
  {
    $display = (int) $display;

    // if ($id_user > 0)
    // {
      $this->_display = $display;
    // }
  }


  public function jsonSerialize()
  {
      return get_object_vars($this);
  }

}