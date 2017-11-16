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
    $computedChroma = $this->getValue() * $this->getSaturation();
    $computedHAux = $this->getHue() / 60.0;
    $computedHTemp = $computedHAux;
    while($computedHTemp >= 2.0) $computedHTemp-=2.0;
    $computedX = $computedChroma * (1 - abs($computedHTemp-1));
    $computedM = $this->getValue() - $computedChroma;
    switch(floor($computedHAux)) {
        case 0:
            $red1 = $computedChroma; $green1 = $computedX; $blue1 = 0.0; break;
        case 1:
            $red1 = $computedX; $green1 = $computedChroma; $blue1 = 0.0; break;
        case 2:
            $red1 = 0.0; $green1 = $computedChroma; $blue1 = $computedX; break;
        case 3:
            $red1 = 0.0; $green1 = $computedX; $blue1 = $computedChroma; break;
        case 4:
            $red1 = $computedX; $green1 = 0.0; $blue1 = $computedChroma; break;
        case 5:
            $red1 = $computedChroma; $green1 = 0.0; $blue1 = $computedX; break;
        default:
            $red1 = 0.0; $green1 = 0.0; $blue1 = 0.0; break;
    }

    $red = (int)round(($red1 + $computedM) * 255, 0);
    $green = (int)round(($green1 + $computedM) * 255, 0);
    $blue = (int)round(($blue1 + $computedM) * 255, 0);

    return new RGB($red, $green, $blue);
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
