<?php

namespace ColorLib;

error_reporting(E_ALL);
ini_set('display_errors', "On");
include_once('../src/ColorInterface.php');
include_once('../src/Color.php');
include_once('../src/Gradient.php');
include_once('../src/RGB.php');
include_once('../src/HSV.php');


echo('<h2>10 steps gradient</h2>');

$first = new RGB(0, 255, 0);
$second = new RGB(255, 0, 0);
$gradient = new Gradient($first, $second);
foreach ($gradient->getGradientArr() as $color) {
  echo('<span style="background-color:'.$color->getHexaColorString().'">&nbsp;</span>');
}


echo('<h2>30 steps gradient</h2>');

$first = new RGB(0, 255, 0);
$second = new RGB(255, 0, 0);
$gradient = new Gradient($first, $second, 30);
foreach ($gradient->getGradientArr() as $color) {
  echo('<span style="background-color:'.$color->getHexaColorString().'">&nbsp;</span>');
}


echo('<h2>100 steps gradient</h2>');

$first = new RGB(0, 255, 0);
$second = new RGB(255, 0, 0);
$gradient = new Gradient($first, $second, 100);
foreach ($gradient->getGradientArr() as $color) {
  echo('<span style="background-color:'.$color->getHexaColorString().'">&nbsp;</span>');
}


echo('<h2>150 steps gradient</h2>');

$first = new RGB(0, 255, 0);
$second = new RGB(255, 0, 0);
$gradient = new Gradient($first, $second, 150);
foreach ($gradient->getGradientArr() as $color) {
  echo('<span style="background-color:'.$color->getHexaColorString().'">&nbsp;</span>');
}
 ?>
