<?php
require_once "SendFactory.php";
$sender = SendFactory::getInstance('sms');
$sender->send();
