<?php
if (isset($_POST["_id"])) {
    include('../configurationDB.php');
    include($fileNameConnection);

    $id = $_POST["_id"];
    if (deleteBook($dbconnect, $id)) {
        header("Location: http://librarysite/pages/bookResult.php");
    } else {
        echo "Ошибка: " . $dbconnect->error;
    }
}