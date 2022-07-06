<div class="page__main-block main-block">
    <div class="main-block__container _container">
        <div class="main-block__body">
            <div class="main-block__text">
                <a href='addBook.php'><h1>Добавить книгу</h1></a>
                <?php
                include('../configurationDB.php');
                include($fileNameConnection);
                $books = getBookBySearch($dbconnect, $search);
                foreach ($books as $book)
                {
                    require('../templates/bookBlock.php');
                }
                ?>
            </div>
        </div>
    </div>
</div>