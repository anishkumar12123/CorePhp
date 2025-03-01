<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "phpapi";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Database Connection Failed!"]));
}
?>
