<?php

namespace Arith;

class Arith {

    private $currentvalue = 0;


    function __construct($inital_string) {
      $this->currentvalue = ArithString::fromString($inital_string);
    }

    public function add($string) {
      $this->currentvalue += ArithString::fromString($string);
      return $this->getStringValue();
    }

    private function getStringValue() {
      return ArithString::toString($this->currentvalue);
    }

}

?>