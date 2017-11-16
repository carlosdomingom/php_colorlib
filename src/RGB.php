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

  public function convertToHSV(){
    $maxRGB = max($this->red, $this->green, $this->blue) / 255;
    $minRGB = min($this->red, $this->green, $this->blue) / 255;
    $computedV = $maxRGB;
    $computedS = ($maxRGB==0)?0:(1-$minRGB/$maxRGB);
    if($maxRGB == $minRGB)
      $computedH=0;
    else{
      if(($maxRGB == $this->red / 255) && ($this->green / 255 >= $this->blue  / 255))
        $computedH = 60 * ($this->green / 255 - $this->blue / 255) / ($maxRGB - $minRGB) + 0;
      else{
        if(($maxRGB == $this->red /255) && ($this->green / 255 < $this->blue / 255))
          $computedH = 60 * ($this->green / 255 - $this->blue / 255) / ($maxRGB - $minRGB) + 360;
        else{
          if($maxRGB == $this->green / 255)
            $computedH = 60 * ($this->blue / 255 - $this->red / 255) / ($maxRGB - $minRGB) + 120;
          else{
            if($maxRGB == $this->blue / 255)
              $computedH = 60 * ($this->red / 255 - $this->green / 255) / ($maxRGB - $minRGB) + 240;
          }
        }
      }
    }
    return new HSV($computedH, $computedS, $computedV);
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
