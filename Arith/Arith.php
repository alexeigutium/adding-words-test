<?php

namespace Arith;

class Arith {

    private $currentvalue = 0;

    function __construct($inital_string) {
      $this->currentvalue = ArithStringUtil::fromString($inital_string);
    }

    public function add($string) {
      return ArithStringUtil::toString($this->currentvalue + ArithStringUtil::fromString($string));
    }
}

?>