<?php
class Singleton {
  private $obj;

  private function __construct() {

  }

  static function getInstance() {
    if(self::$obj) {
      return self::$obj;
    }
    $self::$obj = new self();
    return self::$obj;
  }
}
