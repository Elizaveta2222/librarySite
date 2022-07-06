<div class="page__main-block main-block">
    <div class="main-block__container _container">
        <div class="main-block__body">
            <div class="main-block__text">
                <?php
                require_once('modelSQL/get.php');
                $readers = getReaderFromSearchSQL($dbconnect, $search);
                foreach ($readers as $reader)
                {
                    require('templates/readerBlock.php');
                }
                ?>
            </div>
        </div>
    </div>
</div>