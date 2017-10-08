<?php
require_once "Sender.php";
class SmsSender implements Sender{
  function send() {
    echo "This is SmsSender\n";
  }
}
