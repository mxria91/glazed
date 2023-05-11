<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "glazed";

// Verbindung aufbauen
$connection = new mysqli($servername, $username, $password, $dbname);
// Verbindungsüberprüfung
if($connection->connect_error) {
    die("Verbindung fehlgeschlagen." . $connection->connect_error);
}
// 



// Initiate connection to data base
$db_connect = mysqli_connect("localhost", "root", "", "glazed");
mysqli_set_charset($db_connect, "utf8");
?>