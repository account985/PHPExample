<?php
require_once "MailSender.php";
require_once "SmsSender.php";

/*
* 普通工厂方法
*/

class SendFactory {
    static function getInstance($type = 'mail') {
    if($type == 'mail') {
      return new MailSender();
    }else if($type == 'sms') {
      return new SmsSender();
    }else {
      echo "请输入正确的类型\n";
      return null;
    }
  }
}

/*
* 多个工厂方法
*/

class MulSendFactory {
  static function produceMail() {
    return new MailSender();
  }

  static function produceSms() {
    return new SmsSender();
  }
}
