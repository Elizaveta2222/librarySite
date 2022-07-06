<?php
function deleteBook($client, $id)
{
    $id = new \MongoDB\BSON\ObjectId($id);
    $book = $client->library->book;
    $result = $book->deleteOne(['_id' => $id]);


    return $result;
}