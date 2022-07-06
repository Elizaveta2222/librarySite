<?php
$SQL = 1;
$fileNameConnection = "";
if ($SQL)
{
    $fileNameConnection = "../include/dbMySql.php";
}
else
{
    $fileNameConnection = "../include/dbMongo.php";
}