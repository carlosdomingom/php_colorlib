<?php

  namespace ColorLib;

  /**
  * @package php_colorlib
  * @link https://github.com/carlosdomingom/php_colorlib/
  * @author Carlos Domingo <carlos.domingom@gmail.com>
  */
  abstract class Color implements ColorInterface
  {

    /**
    * Call the convert to HSV function depending on the color
    *
    */
    public function convertToHSV(){
      if (get_class($this) == "ColorLib\HSV") return;
      $this->_convertToHSV();
    }

    /**
    * Call the convert to RGB function depending on the color
    *
    */
    public function convertToRGB(){
      if (get_class($this) == "ColorLib\RGB") return;
      $this->_convertToRGB();
    }

    /**
    * Returns a string indicating the hexadecimal color for the object
    * @return String
    */
    public function getHexaColorString(){
      $converted = $this->convertToRGB();
      $hexared = (strlen(dechex($converted->getRed()))==1)?"0".dechex($converted->getRed()):dechex($converted->getRed());
      $hexagreen = (strlen(dechex($converted->getGreen()))==1)?"0".dechex($converted->getGreen()):dechex($converted->getGreen());
      $hexablue = (strlen(dechex($converted->getBlue()))==1)?"0".dechex($converted->getBlue()):dechex($converted->getBlue());
      $hexacode = $hexared.$hexagreen.$hexablue;
      return('#'.$hexacode);
    }
  }

?>
