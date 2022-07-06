<div class="card">
    <table style="color: #16232B; font-size: 24px">
        <tr>
            <h1 style="font-size: 32px">
                <?php
                print ($book['title']);
                ?>
            </h1>
        </tr>
        <tr>
            <td class="elem">Год:</td>
            <td class="elem">Жанр:</td>
            <td class="elem">Автор:</td>
        </tr>
        <tr>
            <td class="elem">
                <h3>
                    <?php
                    print ($book['year']);
                    ?>
                </h3>
            </td>
            <td class="elem">
                <h3>
                    <?php
                    if ($SQL)
                    {
                        print ($book['genre']);
                    }
                    else
                    {
                        $genres = getGenres($dbconnect);
                        foreach($genres as $g)
                        {
                            if ($g['_id'] == $book['genre'])
                            { print $g['name']; }
                        }
                    }
                    ?>
                </h3>
            </td>
            <td class="elem">
                <h3>
                    <?php
                    $str = "";
                    foreach ($book['author'] as $a)
                    {
                        $str = $str . $a['authorFirst'] . ' ' . $a['authorLast'] . ', ';
                    }
                    $str = rtrim($str,', ');
                    print $str;
                    ?>
                </h3>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                print $book['_id'];
                echo "<td><form action='../controller/deleteBook.php' method='post'>
                    <input type='hidden' name='_id' value='" . $book["_id"] . "' />
                    <input type='submit' value='Удалить'>
                </form></td>";
                echo "<td><a href='updateBook.php?_id=" . $book["_id"] . "'>Изменить</a></td>";
                ?>
        </tr>
    </table>
    </table>
</div>