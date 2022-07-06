<?php
function deleteBook($dbconnect, $id)
{
    $id = $dbconnect->real_escape_string($id);
    $sql = "DELETE FROM book WHERE id = '$id'";
    $b = $dbconnect->query($sql);
    return $b;
}
