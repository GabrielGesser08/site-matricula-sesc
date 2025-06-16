<?php
session_start();
$_SESSION['mensagem'] = NULL;

include("./data/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
    $confirma_senha = filter_input(INPUT_POST, "confirma_senha", FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);

    if ($senha !== $confirma_senha) {
        $_SESSION['mensagem'] = "As senhas não coincidem!";
        header("Location: ../pages/cadastro.php");
        exit;
    }

    try {
        $sql = "INSERT INTO cadastro (email, senha, confirma_senha, cpf)
                VALUES (:email, :senha, :confirma_senha, :cpf)";
        $insert = $conexao->prepare($sql);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':senha', $senha);
        $insert->bindParam(':confirma_senha', $confirma_senha);
        $insert->bindParam(':cpf', $cpf);
        $insert->execute();

        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
        header("Location: ../pages/matricula.php");
        exit;
    } catch (\Throwable $th) {
        $_SESSION['mensagem'] = "Erro ao cadastrar: " . $th->getMessage();
        header("Location: ../pages/cadastro.php");
        exit;
    }
}

?>
