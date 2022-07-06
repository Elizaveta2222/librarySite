<?php
require_once('../renderTemplate.php');
$funcName = "../controller/updateGetBook.php";
$page_content = renderTemplate('templates/templWithVar', ['funcName' => $funcName]);

$layout_content = renderTemplate('templates/layout',
    ['content' => $page_content, 'title' => 'Изменение книги']);

print($layout_content);