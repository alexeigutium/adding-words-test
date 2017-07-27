<?php
/**
 * Created by PhpStorm.
 * User: agutium
 * Date: 7/27/17
 * Time: 11:35 AM
 */

namespace Arith;


class ArithString
{
  private static $numbers = [
    0 => "zero",
    1 => "one",
    2 => "two",
    3 => "three",
    4 => "four",
    5 => "five",
    6 => "six",
    7 => "seven",
    8 => "eight",
    9 => "nine",
    10 => "ten",
    11 => "eleven",
    12 => "twelve"
  ];

  public static function toString($number) {
    return self::getStringHundreds($number/100).self::getStringDozens($number%100);
  }

  public static function fromString($string) {
    $a = explode(" ",strtolower($string));
    $n = 0;
    foreach ($a as $i)
      $n = $n * 10 + self::getNumberFromString($i);
    return $n;
  }

  private static function getStringHundreds($number) {
    return "";
  }

  private static function getStringDozens($number) {
    if (isset(self::$numbers[$number]))
      return self::$numbers[$number];
  }

  function getNumberFromString($string) {
    if (($number = array_search($string, self::$numbers))!==false)
      return $number;
    return 0;
  }
}
