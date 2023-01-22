<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "escolarit";
$port = 3306;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$db;port=$port", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>