<?php

  namespace ColorLib;

  /**
  * Gradient creation and management
  * @package php_colorlib
  * @link https://github.com/carlosdomingom/php_colorlib/
  * @author Carlos Domingo <carlos.domingom@gmail.com>
  */
  class Gradient
  {
    /**
    * Starting color of the gradient
    * @var Color $startColor
    */
    private $startColor;

    /**
    * Finish color of the gradient
    * @var Color $finishColor
    */
    private $finishColor;

    /**
    * Number of colors between start and finish points. More hops means
    * a gentle gradient
    * @var int $hops
    */
    private $hops;

    /**
    * Array containing all gradient colors
    * @var Color[] $gradientArr
    */
    private $gradientArr = Array();

    /**
    * Create a new gradient
    *
    * @param Color $first Start color of the gradient
    * @param Color $second Finish color of the gradient
    * @param int $h Number of levels in the gradient
    */
    function __construct($first, $second, $h = 10)
    {
      // First, ensure to convert all colors to HSV
      $this->startColor = $first->convertToHSV();
      $this->finishColor = $second->convertToHSV();
      $this->hops = $h - 1;
      $gradientArr = Array();

      // Get the increment of each hop
      $stepHue = abs($this->startColor->getHue() - $this->finishColor->getHue()) / $this->hops;
      $stepSaturation = abs($this->startColor->getSaturation() - $this->finishColor->getSaturation()) / $this->hops;
      $stepValue = abs($this->startColor->getValue() - $this->finishColor->getValue()) / $this->hops;

      for($i=0; $i<=$this->hops; $i++){
        // Increase or decrease depending on the vector direction
        if($this->startColor->getHue() < $this->finishColor->getHue()){
          $newH = $this->startColor->getHue() + ($stepHue * $i);
        }else{
          $newH = $this->startColor->getHue() - ($stepHue * $i);
        }
        $newS = ($this->startColor->getSaturation() >= $this->finishColor->getSaturation())?$this->startColor->getSaturation() - ($stepSaturation*$i):$this->startColor->getSaturation() + ($stepSaturation*$i);
        $newV = ($this->startColor->getValue() >= $this->finishColor->getValue() )?$this->startColor->getValue() - ($stepValue*$i):$this->startColor->getValue() + ($stepValue*$i);
        array_push($this->gradientArr, new HSV($newH, $newS, $newV));

      }
    }

    /**
    * Returns gradientArray
    *
    * @return Array
    */
    public function getGradientArr(){
      return $this->gradientArr;
    }

  }

?>
