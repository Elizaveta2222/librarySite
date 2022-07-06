<?php
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    include('../configurationDB.php');
    include($fileNameConnection);
    $bookid = $_GET["id"];
    $result = getBookById($dbconnect, $bookid);
    if ($result)
    {
        foreach ($result as $book)
        {
            $title = $book["title"];
            $year = $book["year"];
            $genre = $book["genre"];

            $authorFirst = $book["authorFirst"];
            $authorLast = $book["authorLast"];
            echo "<h3>Обновление пользователя</h3>
                <form method='post' action='http://librarysite/controller/updatePostBook.php'>
                    <input type='hidden' name='id' value='$bookid' />
                    <p>Название:
                    <input type='text' name='title' value='$title' /></p>
                    <p>Год:
                    <input type='date' name='year' value='$year' /></p>
                    <p>Жанр:";

            echo "<select name = 'genre'>";
            $genres = getGenres($dbconnect);
            foreach($genres as $g)
            {
                $idGen = $g['id'];
                $nameGen = $g['name'];
                echo "<option value = '$idGen' >$nameGen</option>";
            }
            echo "</select>";
            $c = -1;
            foreach ($book['author'] as $author)
            {
                $c++;
                $authorFirst = $author['authorFirst'];
                $authorLast = $author['authorLast'];
                echo "<p>Имя автора:
                    <input type='text' name='authorFirst$c' value='$authorFirst' /></p>
                    <p>Фамилия автора:
                    <input type='text' name='authorLast$c' value='$authorLast' /></p>";
            }

            echo "<input type='hidden' name='counter' value='$c' />
<input type='submit' value='Сохранить'>
</form>";
        }
    } else
    {
        echo "<div>Книга не найдена</div>";
    }
}
