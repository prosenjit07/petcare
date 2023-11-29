<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "petcare";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection was not successfull due to this error: " . mysqli_connect_error());
}
