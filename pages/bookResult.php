<?php
require_once('../renderTemplate.php');
if (isset($_REQUEST['button_f'])) {
    $search = $_REQUEST['search'];
}

$page_content = renderTemplate('templates/booksDisplay', ['search' => $search]);
$layout_content = renderTemplate('templates/layout',
    ['content' => $page_content, 'title' => 'Результат поиска книги']);

print($layout_content);