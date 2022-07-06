<?php
require_once('renderTemplate.php');

$page_content = renderTemplate('templates/ReadersDisplay', ['search' => $search]);

$layout_content = renderTemplate('templates/layout',
    ['content' => $page_content, 'title' => 'Результат поиска книги']);

print($layout_content);