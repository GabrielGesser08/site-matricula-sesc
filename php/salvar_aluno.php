<?php
include 'data/config.php';

$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmar_senha = $_POST['confirmar_senha'];
$cpf = $_POST['cpf'];
$status = $_POST['status_matricula'];

// Validações básicas
if ($senha !== $confirmar_senha) {
    echo "As senhas não coincidem.";
    exit;
}

if (empty($email) || empty($senha) || empty($cpf) || empty($status)) {
    echo "Todos os campos são obrigatórios.";
    exit;
}

// Criptografar a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Inserir na tabela usuarios
$stmt_usuario = $conexao->prepare("INSERT INTO usuarios (email, senha, cpf) VALUES (?, ?, ?)");
$stmt_usuario->bind_param("ssi", $email, $senha_hash, $cpf);

if ($stmt_usuario->execute()) {
    $usuario_id = $stmt_usuario->insert_id;

    // Inserir na tabela alunos
    $stmt_aluno = $conexao->prepare("INSERT INTO alunos (usuario_id, cpf, status_matricula) VALUES (?, ?, ?)");
    $stmt_aluno->bind_param("iss", $usuario_id, $cpf, $status);

    if ($stmt_aluno->execute()) {
        echo "Cadastro realizado com sucesso!";
        // header("Location: ../pages/cadastroSucesso.php");
    } else {
        echo "Erro ao cadastrar aluno: " . $stmt_aluno->error;
    }

    $stmt_aluno->close();
} else {
    echo "Erro ao cadastrar usuário: " . $stmt_usuario->error;
}

$stmt_usuario->close();
$conexao->close();
?>



