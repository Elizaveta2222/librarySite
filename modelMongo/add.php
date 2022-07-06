<?php
function addBook($client, $title, $year, $genreId, $authors)
{
    $book = $client->library->book;
    $book->insertOne
    (
        [
            'title' => $title,
            'year' => $year,
            'genre' => $genreId,
            'author' => $authors
        ]
    );
    return true;
}
