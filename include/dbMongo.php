<?php
require '../vendor/autoload.php';
$dbconnect = new MongoDB\Client('mongodb://127.0.0.1/');

require_once ('../modelMongo/get.php');
require_once ('../modelMongo/add.php');
require_once ('../modelMongo/delete.php');
require_once ('../modelMongo/update.php');

