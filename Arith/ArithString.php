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
    12 => "twelve",
    20 => "twenty",
    30 => "thirty",
    40 => "forty"
  ];

  public static function toString($number) {
    return self::getStringHundreds($number);
  }

  public static function fromString($string) {
    $a = explode(" ",strtolower($string));
    $n = 0;
    foreach ($a as $i) {

      if (in_array($i, ["hundred", "hundreds"])) {
        $n *= 100;
      } else
        $n += self::getNumberFromString($i);
    }

    return $n;
  }

  private static function getStringHundreds($number) {
    if ($number>=100)
      return self::getStringDozens($number / 100)." hundred".(($number % 100 > 0)?" and ".self::getStringDozens($number%100):"");
    //.(($number % 10 >1) && ($number % 100 != 11)?"s":"")
    return self::getStringDozens($number%100);
  }

  private static function getStringDozens($number) {
    if (isset(self::$numbers[$number]))
      return self::$numbers[$number];
    if ($number<20)
      return self::getStringDozens($number - 10)."teen";
    return (isset(self::$numbers[self::getD10($number)*10])?(self::$numbers[self::getD10($number)*10]):self::getStringDozens($number/10)."ty").(($number % 10)?" ".self::getStringDozens($number % 10):"");
  }

  private static function getD10($number) {
    return intval($number/10);
  }

  private static function getNumberFromString($string) {
    if (($number = array_search($string, self::$numbers))!==false)
      return $number;
    return self::checkHardNumberInString($string);

  }

  private static function checkHardNumberInString($string) {
    return substr($string,-2)=="ty" ?
        self::getFromStringDozens(substr($string,0,-2)) :
        self::getFromStringTeens(substr($string,0,-4));
  }

  private static function getFromStringDozens($string) {
    if (($number = array_search($string, self::$numbers))!==false)
      return $number * 10;
  }

  private static function getFromStringTeens($string) {
    if (($number = array_search($string, self::$numbers))!==false)
      return $number + 10;
  }
}
