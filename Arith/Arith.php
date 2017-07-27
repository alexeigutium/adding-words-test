<?php

namespace Arith;

class Arith {

    private $currentvalue = 0;


    function __construct($inital_string) {
      $this->currentvalue = ArithString::fromString($inital_string);
    }

    public function add($string) {
      return $this->getNumericValue();
    }


    private function getNumericValue() {
      return ArithString::toString($this->currentvalue);
    }

}

?>