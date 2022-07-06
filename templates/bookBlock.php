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
                    print ($book['genre']);
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
                print $book['id'];
                echo "<td><form action='../controller/deleteBook.php' method='post'>
                    <input type='hidden' name='id' value='" . $book["id"] . "' />
                    <input type='submit' value='Удалить'>
                </form></td>";
                echo "<td><a href='updateBook.php?id=" . $book["id"] . "'>Изменить</a></td>";
                ?>
        </tr>
    </table>
    </table>
</div>