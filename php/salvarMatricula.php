
<?php
include("./data/config.php");


$nome = $_POST['nome_completo'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$sus = $_POST['sus'];
$data_nasc = $_POST['data_nascimento'];
$sexo = $_POST['sexo'];
$nacionalidade = $_POST['nacionalidade'];


$sql = "INSERT INTO matriculas (nome_completo, cpf, rg, sus, data_nascimento, sexo, nacionalidade) VALUES ('$nome', '$cpf', '$rg', '$sus', '$data_nasc', '$sexo', '$nacionalidade')";
$insert = $conexao->prepare($sql);
$insert->bindParam(':nome_completo', $nome_completo);
$insert->bindParam(':cpf', $cpf);
$insert->bindParam(':rg', $rg);
$insert->bindParam(':sus', $sus);
$insert->bindParam(':data_nascimento', $data_nasc);
$insert->bindParam(':sexo', $sexo);
$insert->bindParam(':nacionalidade', $nacionalidade);


?>
