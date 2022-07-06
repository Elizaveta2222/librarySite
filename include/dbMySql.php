<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'library');
$dbconnect = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($dbconnect->connect_errno) exit('Ошибка подключения к БД');
$dbconnect->set_charset('utf8');

include ('../modelSQL/delete.php');
require_once ('../modelSQL/get.php');
require_once ('../modelSQL/update.php');
require_once ('../modelSQL/add.php');

?>