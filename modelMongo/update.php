<?php
function updateBook($client, $id, $title, $year, $genreId, $authors)
{
    $id = new \MongoDB\BSON\ObjectId($id);
    $book = $client->library->book;
    //var_dump($authors);
    $result = $book->updateOne(['_id' => $id], ['$set' => ['title' => $title, 'year' => $year, 'genre' => $genreId, 'author' => $authors]]);

    return $result;
}