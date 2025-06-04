<?php 
session_start();
$_SESSION['mensagem'] = NULL;

// Estabelecer a conexão com o banco de dados
include_once("./data/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email - filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmar_senha = filter_input(INPUT_POST, "repetirSenha", FILTER_SANITIZE_SPECIAL_CHARS); 
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_SPECIAL_CHARS);


    if ($senha !== $confirmar_senha) {
        $_SESSION['mensagem'] = "Senhas devem ser iguais!";
        header("Location: ../pages/cadastro.php");
        exit;
    }
    
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Código para realizar o INSERT na tabela usuarios
    try {
        $sql = "INSERT INTO usuarios (email, senha, confirmar_senha, cpf) VALUES 
                (:email, :senha, :confirmar_senha, :cpf)";
        $insert = $conexao->prepare($sql);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':senha', $senhaCriptografada);
        $insert->bindParam(':confrimar_senha', $confirmar_senha);
        $insert->bindParam(':cpf', $cpf);

        if ($insert->execute() && $insert->rowCount() > 0) {
            $_SESSION['mensagem'] = "Cadastrado com sucesso";
            header('Location: ' . BASE_URL . '../pages/cadastro.php'); 
            exit;
        } else {
            throw new Exception("Ocorreu um erro ao cadastrar!");
        }
    } catch (Exception $e) {
        $_SESSION['mensagem'] = "Ocorreu um erro ao cadastrar / Usuário já cadastrado: " . $e->getMessage();
        header('Location: ' . BASE_URL . '../pages/cadastro.php');
        exit;
    } finally {
        // Fecha a conexão com o BD
        unset($conexao);
    }
}
?>

