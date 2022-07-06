<?php
function addBook($dbconnect, $title, $year, $genreId, $authors)
{
    $genreId = $dbconnect->real_escape_string($genreId);
    $sqlIns = "INSERT INTO book (genre_id, name, year) VALUES ('$genreId', '$title', '$year');";
    $b = mysqli_query($dbconnect, $sqlIns);
    $bookId = $dbconnect->insert_id;
    foreach ($authors as $author)
    {
        $authorF = $author['authorFirst'];
        $authorL = $author['authorLast'];
        $sqlCheck = "SELECT * FROM author WHERE author.first_name = '$authorF' AND author.last_name = '$authorL';";
        $check = mysqli_query($dbconnect, $sqlCheck);
        $check = mysqli_fetch_all($check, MYSQLI_ASSOC);
        if (!empty($check))
        {
            foreach ($check as $c)
            $authorId = $c['id'];
        }
        else
        {
            $sqlAuthorIns = "INSERT INTO author (first_name, last_name) VALUES ('$authorF', '$authorL');";
            $dbconnect->query($sqlAuthorIns);
            $authorId = $dbconnect->insert_id;
        }

        $sqlAuthorShip = "INSERT INTO authorship (author_id, book_id) VALUES ('$authorId', '$bookId');";
        $dbconnect->query($sqlAuthorShip);
    }
    return $b;
}