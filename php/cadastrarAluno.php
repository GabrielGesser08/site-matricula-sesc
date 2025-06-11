<?php
session_start();
$_SESSION['mensagem'] = NULL;

include("./data/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = filter_input(INPUT_POST, "nome_completo", FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);
    $rg = filter_input(INPUT_POST, "rg", FILTER_SANITIZE_SPECIAL_CHARS);
    $sus = filter_input(INPUT_POST, "sus", FILTER_SANITIZE_SPECIAL_CHARS);
    $data_nascimento = filter_input(INPUT_POST, "data_nascimento", FILTER_SANITIZE_SPECIAL_CHARS);
    $sexo = filter_input(INPUT_POST, "sexo", FILTER_SANITIZE_SPECIAL_CHARS);
    $nacionalidade = filter_input(INPUT_POST, "nacionalidade", FILTER_SANITIZE_SPECIAL_CHARS);

    try {
        $sql = "INSERT INTO matriculas 
                (nome_completo, cpf, rg, sus, data_nascimento, sexo, nacionalidade)
                VALUES 
                (:nome_completo, :cpf, :rg, :sus, :data_nascimento, :sexo, :nacionalidade)";

        $insert = $conexao->prepare($sql);
        $insert->bindParam(':nome_completo', $nome_completo);
        $insert->bindParam(':cpf', $cpf);
        $insert->bindParam(':rg', $rg);
        $insert->bindParam(':sus', $sus);
        $insert->bindParam(':data_nascimento', $data_nascimento);
        $insert->bindParam(':sexo', $sexo);
        $insert->bindParam(':nacionalidade', $nacionalidade);

        $insert->execute();
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
        header("location: ../pages/matriculaRealizada.php");
    } catch (\Throwable $th) {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . $th->getMessage();
        header("location: ../pages/matricula.php");
    }
}
?>