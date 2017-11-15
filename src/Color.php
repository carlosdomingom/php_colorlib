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
  }

?>
