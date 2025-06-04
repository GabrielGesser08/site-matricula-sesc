<?php
# Variaveis Para acesso ao banco de dados

$dbHost = "localhost";
$dbNome = "site_matricula_sesc";
$dbUser = "root";
$dbPassword = "";

try {
    $conexao = new PDO("mysql:host=$dbHost; dbname=$dbNome; charset=utf8", $dbUser, $dbPassword);
} catch (PDOException $erro) {
    echo 'Erro ao conectar com o Banco de Dados: ' . $erro->getMessage();
}


define('BASE_URL', 'http://172.17.34.253:1200/phpmyadmin/index.php?route=/database/structure&db=site_matricula_sesc');
// define('BASE_URL', 'https://caioba.pr.senac.br/projetos/202300005/Grupo02');
?>