<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_db";

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if (!($conn->query($sql) === TRUE)) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    pubdate DATE NOT NULL,
    quantity INT NOT NULL
)";

if (!($conn->query($sql) === TRUE)) {
    die("Error creating table: " . $conn->error);
}

?>