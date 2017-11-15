<?php

namespace ColorLib;

/**
 * @package ColorLib
 * @link https://github.com/carlosdomingom/php_colorlib/
 * @author Carlos Domingo
 */

class HSV extends Color
{
  private $hue;
  private $saturation;
  private $value;

  function __construct($h = 0, $s = 0, $v = 0)
  {
    // Check if parameters are int values
    if(!is_numeric($h) || !is_numeric($s) || !is_numeric($v)){
      throw new \Exception('Values must be numeric');
    }

    //Check if parameters are in the proper range 0->255
    if(!($h>=0 && $h <=360) || !($s>=0 && $s <=1) || !($v>=0 && $v <=1)){
      throw new \Exception('Expected values from 0 to 360 in hue, and 0 to 1 in saturation and value');
    }
    $this->hue = $h;
    $this->saturation = $s;
    $this->value = $v;
  }


  public function convertToRGB(){
    echo("Convertido a RGB");
  }

  public function getHue() :float
  {
    return $this->hue;
  }

  public function getSaturation(): float
  {
    return $this->saturation;
  }

  public function getValue(): float
  {
    return $this->value;
  }
}


 ?>
