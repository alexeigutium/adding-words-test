<?php
/**
 * Created by PhpStorm.
 * User: agutium
 * Date: 7/27/17
 * Time: 11:35 AM
 */

namespace Arith;


class ArithStringUtil
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
    if ($number>=100)
      return self::findStringRuleForDozens($number / 100)." hundred".(($number % 100 > 0)?" and ".self::findStringRuleForDozens($number % 100):"");
    //.(($number % 10 >1) && ($number % 100 != 11)?"s":"")
    return self::findStringRuleForDozens($number % 100);
  }

  private static function findStringRuleForDozens($number) {
    if (isset(self::$numbers[$number]))
      return self::$numbers[$number];
    if ($number<20)
      return self::findStringRuleForDozens($number - 10)."teen";
    return self::getStringForDozens($number);
  }

  private static function getStringForDozens($number) {
    $dozen = self::getD10($number)*10;
    return (isset(self::$numbers[$dozen])
        ?(self::$numbers[$dozen])
      :self::findStringRuleForDozens(self::getD10($number))."ty").
        (($number % 10)?" ".self::findStringRuleForDozens($number % 10):"");
  }

  private static function getD10($number) {
    return intval($number/10);
  }

  public static function fromString($string) {
    $a = explode(" ",strtolower($string));
    $n = 0;
    foreach ($a as $i) {
      $n = self::findAndExecuteRuleForWord($n, $i);
    }
    return $n;
  }

  private static function findAndExecuteRuleForWord($n, $string) {
    if (in_array($string, ["hundred", "hundreds"])) {
      return $n * 100;
    } else
      return $n + (self::getNumberFromString($string));
  }

  private static function getNumberFromString($string) {
    if (($number = array_search($string, self::$numbers))!==false)
      return $number;
    return self::checkDozenOrTeenInString($string);

  }

  private static function checkDozenOrTeenInString($string) {
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
