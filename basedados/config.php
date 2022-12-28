<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "redes";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Conexão Falhou.')</script>");
}

?>