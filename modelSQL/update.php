<?php
function updateBook($dbconnect, $id, $title, $year, $genreId, $authors)
{
    $id = $dbconnect->real_escape_string($id);
    $genreId = $dbconnect->real_escape_string($genreId);

    $sql = "UPDATE book SET book.name = '$title', book.year = '$year',  book.genre_id = '$genreId' WHERE id = '$id';";
    $b = $dbconnect->query($sql);
    $sql = "DELETE FROM authorship WHERE id = '$id'";
    $b = $dbconnect->query($sql);

    foreach ($authors as $author) {
        $authorF = $author['authorFirst'];
        $authorL = $author['authorLast'];
        $sqlCheck = "SELECT * FROM author WHERE author.first_name = '$authorF' AND author.last_name = '$authorL';";

        $check = mysqli_query($dbconnect, $sqlCheck);
        $check = mysqli_fetch_all($check, MYSQLI_ASSOC);
        if (!empty($check)) {
            foreach ($check as $c)
                $authorId = $c['id'];

        } else {
            $sqlAuthorIns = "INSERT INTO author (first_name, last_name) VALUES ('$authorF', '$authorL');";
            $dbconnect->query($sqlAuthorIns);
            $authorId = $dbconnect->insert_id;
        }
        $sqlAuthorShip = "INSERT INTO authorship (author_id, book_id) VALUES ('$authorId', '$id');";
        $dbconnect->query($sqlAuthorShip);
    }
    return true;
}