<?php
require_once('renderTemplate.php');

$page_content = renderTemplate('templates/search');

$layout_content = renderTemplate('templates/layout',
['content' => $page_content, 'title' => 'Главная страница']);

print($layout_content);
?>