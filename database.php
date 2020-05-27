<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_login_database';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

$conn1 = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_login_database'
  ) or die(mysqli_error($mysqli));

?>