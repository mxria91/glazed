<?php
session_start();

// Initiate connection to data base
$db_connect = mysqli_connect("localhost", "root", "", "glazed");
mysqli_set_charset($db_connect, "utf8");

// Query MySql
function query($sql_query) {
    global $db_connect;
    $result = mysqli_query($db_connect,$sql_query) or die(mysqli_error($db_connect) . "<br>" . $sql_query);
    return $result;
}

?>