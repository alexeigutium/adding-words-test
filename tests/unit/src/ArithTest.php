<?php
/**
 * Created by PhpStorm.
 * User: agutium
 * Date: 7/27/17
 * Time: 11:15 AM
 */

include_once("Arith/Arith.php");
include_once("Arith/ArithString.php");

class ArithTest extends PHPUnit_Framework_TestCase
{

  /**
//   * @test
//   */
//
//  public function testZero()
//  {
//    $k = new Arith\Arith("zero");
//    $this->assertEquals("zero", $k->add("zero"));
//
//  }
//
//  /**
//   * @test
//   */
//
//  public function testInit()
//  {
//    $test_strings = ["one","two","five","twelve"];
//    foreach ($test_strings as $str) {
//      $k = new Arith\Arith($str);
//      $this->assertEquals($str, $k->add("zero"));
//    }
//
//  }
//
//  /**
//   * @test
//   */
//
//  public function testSimpleAdd()
//  {
//    $test_strings = ["one"=>"two", "two"=>"four", "five"=>"ten", "six"=>"twelve"];
//    foreach ($test_strings as $str=>$res) {
//      $k = new Arith\Arith($str);
//      $this->assertEquals($res, $k->add($str));
//    }
//  }
//
//
//  /**
//   * @test
//   */
//
//  public function testTeens()
//  {
//    $test_strings = ["fourteen","twenty","twenty five"];
//    foreach ($test_strings as $str) {
//      $k = new Arith\Arith($str);
//      $this->assertEquals($str, $k->add("zero"));
//    }
//  }

  /**
   * @ test
  */

  public function testSimple()
  {

    $k = new Arith\Arith("three");
    $this->assertEquals("ten", $k->add("seven"));
    $this->assertEquals("eleven", $k->add("eight"));
    $this->assertEquals("three", $k->add("zero"));
    $this->assertEquals("three hundred and forty three", $k->add("three hundred and forty"));
  }

}