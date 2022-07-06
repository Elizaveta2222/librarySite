<?php
include('../configurationDB.php');
include($fileNameConnection);

if (isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["year"])) {
    $bookid = $_POST["id"];

    require_once ('part.php');

    if (updateBook($dbconnect, $bookid, $title, $year, $genreId, $authors))
    {
        header("Location: http://librarysite/pages/bookResult.php");
    }
    else
    {
        echo "Ошибка: " . $dbconnect->error;
    }
} else
{
    echo "Некорректные данные";
}