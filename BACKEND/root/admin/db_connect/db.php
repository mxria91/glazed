<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "glazed";

// DATABASE CONNECTION
$connection = new mysqli($servername, $username, $password, $dbname);
// DATABASE CONNECTION CHECK
if($connection->connect_error) {
    die("Verbindung fehlgeschlagen." . $connection->connect_error);
}
// INITIATE DATABASE CONNECTION
$db_connect = mysqli_connect("localhost", "root", "", "glazed");
mysqli_set_charset($db_connect, "utf8");
?>