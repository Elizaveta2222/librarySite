<?php
//require ('include/dbMongo.php');

function getBookBySearch($client, $search = "")
{
    $genre = $client->library->genre;
    $book = $client->library->book;
    $cursor = $book->find();
    $search = strtolower($search);
    $books = array();

    foreach ($cursor as $obj)
    {
        $str1 = $obj['title'];
        $index = new \MongoDB\BSON\ObjectId($obj['genre']);

        $g = $genre -> findOne(array('_id' => $index));
        $str2 = $g['name'];

        if (!empty($search))
        {
            if (((strpos(strtolower($str1), $search))===false)&&(strpos(strtolower($str2), $search))===false)
            {
            } else
            {
                $books = addBookToArray($books, $obj, $g);
            }
        }
        else
        {
            $books = addBookToArray($books, $obj, $g);
        }
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
    $cursor = $client->library->genre->find();
    $genres = array();
    foreach ($cursor as $obj)
    {
        $genres[] = array('name' => $obj->name, 'id' => $obj->_id);
    }
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