<?php
include('../configurationDB.php');
include($fileNameConnection);

if (isset($_POST["title"]) && isset($_POST["year"]) && isset($_POST["authorFirst0"]) && isset($_POST["authorLast0"]))
{
    require_once ('part.php');
    if (addBook($dbconnect, $title, $year, $genreId, $authors))
    {
        header("Location: http://librarysite/pages/bookResult.php");
    }
    else
    {
        echo "Ошибка: " . $dbconnect->error;
    }
}