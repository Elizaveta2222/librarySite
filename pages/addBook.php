<?php
require_once('../renderTemplate.php');
$funcName = "../templates/addBook.php";

$page_content = renderTemplate('templates/templWithVar', ['funcName' => $funcName]);

$layout_content = renderTemplate('templates/layout',
    ['content' => $page_content, 'title' => 'Добавление книги']);

print($layout_content);