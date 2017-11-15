<?php

namespace ColorLib;

/**
 * @package ColorLib
 * @link https://github.com/carlosdomingom/php_colorlib/
 * @author Carlos Domingo
 */

class RGB extends Color
{
  private $red;
  private $green;
  private $blue;

  function __construct($r = 0, $g = 0, $b = 0)
  {
    // Check if parameters are int values
    if(!is_int($r) || !is_int($g) || !is_int($b )){
      throw new \Exception('Values must be integer');
    }

    //Check if parameters are in the proper range 0->255
    if(!($r>=0 && $r <=255) || !($g>=0 && $g <=255) || !($b>=0 && $b <=255)){
      throw new \Exception('Expected values from 0 to 255');
    }
    $this->red = $r;
    $this->green = $g;
    $this->blue = $b;
  }

  public function getRed() :int
  {
    return $this->red;
  }

  public function getGreen(): int
  {
    return $this->green;
  }

  public function getBlue(): int
  {
    return $this->blue;
  }
}


 ?>
