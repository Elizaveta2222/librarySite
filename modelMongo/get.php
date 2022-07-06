<?php

function getBookBySearch($client, $search = "")
{
    $book = $client->library->book;
    $options = ["typeMap" => ['root' => 'array', 'document' => 'array']];

    $cursor = $book->find([
        'title' => new \MongoDB\BSON\Regex(preg_quote($search), 'i'),
    ], $options);

    return $cursor;
}
function getGenres($client)
{
    $options = ["typeMap" => ['root' => 'array', 'document' => 'array']];
    $genres = $client->library->genre->find([ ], $options)->toArray();
    return $genres;
}
function getBookById($client, $id)
{
    $book = $client->library->book;
    $options = ["typeMap" => ['root' => 'array', 'document' => 'array']];
    $id = new \MongoDB\BSON\ObjectId($id);
    $cursor = $book->find(['_id' => $id], $options);
    return $cursor;
}