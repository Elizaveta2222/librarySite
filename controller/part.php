<?php
$title = $_POST["title"];
$year = $_POST["year"];

if (isset($_POST["genre"]))
{
    $genreId = $_POST["genre"];
}

$c = $_POST["counter"];
//var_dump($c);
$authors = array();

for ($i = 0; $i <= $c; $i++)
{
    if (isset($_POST["authorFirst$i"]) && isset($_POST["authorLast$i"]))
    {
        $authors[$i] = array(
            'authorFirst' => $_POST["authorFirst$i"],
            'authorLast' => $_POST["authorLast$i"]);
        //var_dump($_POST["authorFirst$i"]);
        //var_dump($authors[$i]);

    }
}
