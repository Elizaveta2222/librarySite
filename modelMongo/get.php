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

function addBookToArray($books, $obj, $g)
{
    $id = $obj['_id']->__toString();
    $books[$id]['title'] = $obj->title;
    $books[$id]['year'] = $obj->year;
    $books[$id]['genre'] = $g->name;
    $books[$id]['_id'] = $obj['_id'];

    $c = 0;
    foreach ($obj->author as $item)
    {
        $books[$id]['author'][$c] = array('authorFirst' => $item->authorFirst, 'authorLast' => $item->authorLast);
        $c = $c+1;
    }
    return $books;
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