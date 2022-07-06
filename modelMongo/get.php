<?php

function getBookBySearch($client, $search = "")
{
    $genre = $client->library->genre;
    $book = $client->library->book;

    $cursor = $book->find([
        'title' => new \MongoDB\BSON\Regex(preg_quote($search), 'i'),
    ]);
    $books = array();

    foreach ($cursor as $obj)
    {
        $index = new \MongoDB\BSON\ObjectId($obj['genre']);
        $g = $genre -> findOne(array('_id' => $index));
        $books = addBookToArray($books, $obj, $g);
    }
    return $books;
}

function addBookToArray($books, $obj, $g)
{
    $id = $obj['_id']->__toString();
    $books[$id]['title'] = $obj->title;
    $books[$id]['year'] = $obj->year;
    $books[$id]['genre'] = $g->name;
    $books[$id]['id'] = $obj['_id'];

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
    $genre = $client->library->genre;
    $book = $client->library->book;
    $cursor = $book->find();
    $books = array();

    foreach ($cursor as $obj)
    {
        $str1 = $obj['title'];
        $index = new \MongoDB\BSON\ObjectId($obj['genre']);

        $g = $genre -> findOne(array('_id' => $index));
        $str2 = $g['name'];

        if ($obj->_id == $id)
        {
            $books = addBookToArray($books, $obj, $g);
        }
    }
    return $books;
}