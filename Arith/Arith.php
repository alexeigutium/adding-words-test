<?php
class Arith {

    private $currentvalue = 0;

    function __construct($inital_string) {

    }

    public function add($string) {
      return $this->getNumericValue();
    }


    private function getNumericValue() {
      return $this->currentvalue;
    }

}

?>