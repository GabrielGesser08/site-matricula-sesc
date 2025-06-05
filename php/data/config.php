<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "site_matricula_sesc";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}




define('BASE_URL', 'http://172.17.34.253:1200/phpmyadmin/index.php?route=/database/structure&db=site_matricula_sesc');
// define('BASE_URL', 'https://caioba.pr.senac.br/projetos/202300005/Grupo02');
?>