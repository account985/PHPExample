<?php
define("ROOT",dirname(__FILE__)."/");
set_include_path(".".PATH_SEPARATOR.ROOT."/libs".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.ROOT.PATH_SEPARATOR.get_include_path());
require_once 'mysql.func.php';
require_once 'config.php';
require_once 'string.func.php';
require_once 'image.func.php';
require_once 'common.func.php';
require_once 'verify.php';
session_start();
