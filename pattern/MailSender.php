<?php
require_once "Sender.php";
class MailSender implements Sender {
  function send() {
    echo "THis is mailsender\n";
  }
}
