<?php
require "database.php";
session_name("ID_de_sesion");
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

$id = $_GET["id"];

$statement = $conn->prepare("SELECT * FROM contacts WHERE id=:id");
$statement->execute([":id"=>$id]);

if ($statement->rowCount() == 0) {
  http_response_code(404);
  echo("HTTP 404 NOT FOUND");
}

$statement = $conn->prepare("DELETE FROM contacts WHERE id=:id AND user_id = {$_SESSION["user"]["id"]}");
// $statement->bindParam(":id", $id);
$statement->execute([":id"=>$id]);
if ($statement->rowCount() == 0) {
  echo("HTTP 404 NOT FOUND");
}else{

// Array asociativo en execute para pasar los parametros a la consulta
header("Location: home.php?id=$id");
}
