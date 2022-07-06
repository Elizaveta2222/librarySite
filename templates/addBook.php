<h3>Добавление книги</h3>
<form action="../controller/addBook.php" method="post">
    <div id="container">
        <p>Название:
            <input type='text' name='title' value='' /></p>
        <p>Год:
            <input type='date' name='year' value='' /></p>
        <p>Жанр:";
            <?php
            include('../configurationDB.php');
            include($fileNameConnection);
            echo "<select name = 'genre'>";
            $genres = getGenres($dbconnect);
            foreach($genres as $g)
            {
                $idGen = $g['_id'];
                $nameGen = $g['name'];
                echo "<option value = '$idGen' >$nameGen</option>";
            }
            echo "</select>";?>
            <input type="button" onclick="addAuthor()" value="Добавить автора">
            <input type='hidden' name='counter' id="counter"/>
            <input type="submit" value="Добавить" onclick="getCounter()">
    </div>
</form>
<script type="text/javascript" src="../js/addAuthors.js"></script>