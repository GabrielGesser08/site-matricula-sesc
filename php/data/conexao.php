<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "site_matricula_sesc"; 

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
