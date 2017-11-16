<?php

  namespace ColorLib;

  /**
  * @package php_colorlib
  * @link https://github.com/carlosdomingom/php_colorlib/
  * @author Carlos Domingo <carlos.domingom@gmail.com>
  */
  abstract class Color implements ColorInterface
  {

    function __construct()
    {
      # code...
    }

    public function convertToHSV(){
      if (get_class($this) == "ColorLib\HSV") return;
      $this->_convertToHSV();
    }

    public function convertToRGB(){
      if (get_class($this) == "ColorLib\RGB") return;
      $this->_convertToRGB();
    }

    /**
    * Devuelve una cadena de texto de 7 caracteres (incluida la almohadilla) con el color en formato hexadecimal
    *
    */
    public function getHexaColorString(){
      $converted = $this->convertToRGB();
      $hexared = (strlen(dechex($converted->red))==1)?"0".dechex($converted->red):dechex($converted->red);
      $hexagreen = (strlen(dechex($converted->green))==1)?"0".dechex($converted->green):dechex($converted->green);
      $hexablue = (strlen(dechex($converted->blue))==1)?"0".dechex($converted->blue):dechex($converted->blue);
      $hexacode = $hexared.$hexagreen.$hexablue;
      return('#'.$hexacode);
    }
  }

?>
