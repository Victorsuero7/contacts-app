<?php

$host = "127.0.0.1";
$database = "contacts_app";
$user = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
  // $var = $conn->query('SELECT * FROM contacts')->fetch(PDO::FETCH_ASSOC);
  // print_r($var);
} catch (PDOException $e) {
  die("PDO conecction error: " . $e->getMessage());

}

?>
