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
    3 => "three"
  ];

  public static function toString($number) {
    return self::getStringHundreds($number/100).self::getStringDozens($number%100);
  }

  private static function getStringHundreds($number) {
    return "";
  }

  private static function getStringDozens($number) {
    if (isset(self::$numbers[$number]))
      return self::$numbers[$number];
  }



}