<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "clinica";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}
?>
