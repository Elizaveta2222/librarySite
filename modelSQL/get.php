<?php
function getGenres($dbconnect)
{
    $sql = "SELECT * FROM genre";
    $result = mysqli_query($dbconnect, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}
function getAuthors($dbconnect)
{
    $sql = "SELECT * FROM author";
    $result = mysqli_query($dbconnect, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}

function getBookBySearch($dbconnect, $search = "")
{
    $search = "%" . $search . "%";
    $sql = "SELECT book.id as id, book.name as title, YEAR(book.year) as year, genre.name as genre, author.first_name as authorFirst, author.last_name as authorLast
FROM book
INNER JOIN genre ON book.genre_id = genre.id
INNER JOIN authorship ON book.id = authorship.book_id
INNER JOIN author ON authorship.author_id = author.id
WHERE book.name LIKE '$search'
OR genre.name LIKE '$search';";

    return getBooksFromDB($dbconnect, $sql);
}

function getBooksFromDB($dbconnect, $sql)
{
    $result = mysqli_query($dbconnect, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $books = array();
    foreach ($result as $b)
    {
        if (!(array_key_exists($b['id'], $books)))
            $books = addBookToArray($books, $b);
        else
        {
            $books[$b['id']]['author'][$b['id']]['authorFirst'] = $b['authorFirst'];
            $books[$b['id']]['author'][$b['id']]['authorLast'] = $b['authorLast'];
        }
    }
    return $books;
}
function getBookById($dbconnect, $id)
{
    $sql = "SELECT book.id as id, book.name as title, YEAR(book.year) as year, genre.name as genre, author.first_name as authorFirst, author.last_name as authorLast
FROM book
INNER JOIN genre ON book.genre_id = genre.id
INNER JOIN authorship ON book.id = authorship.book_id
INNER JOIN author ON authorship.author_id = author.id
WHERE book.id = '$id';";

    return getBooksFromDB($dbconnect, $sql);
}

function addBookToArray($books, $b)
{
    $books[$b['id']]['title'] = $b['title'];
    $books[$b['id']]['year'] = $b['year'];
    $books[$b['id']]['genre'] = $b['genre'];
    $books[$b['id']]['author'][] = array('authorFirst' => $b['authorFirst'], 'authorLast' => $b['authorLast']);
    $books[$b['id']]['id'] = $b['id'];
    return $books;
}

function getReaderFromSearchSQL($dbconnect, $search)
{
    $search = "%" . $search . "%";

    $sql =
        "SELECT reader.first_name as readerFirst, reader.last_name as readerLast, reader.number as number
FROM reader
WHERE reader.number LIKE '$search';";
    $result = mysqli_query($dbconnect, $sql);
    $readers = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $readers;
}