<?php
session_start();
$_SESSION['mensagem'] = NULL;

include_once('./data/config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['email']) && !empty($_POST['senha'])) {
        try {
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
            $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $select = $conexao->prepare($sql);
            $select->bindParam(':email', $email);
            $select->execute();

            if ($select->rowCount() > 0) {
                $login = $select->fetch(PDO::FETCH_ASSOC);

                header("Location: ../pages/matricula.php");
                exit;
            }

            $_SESSION['mensagem'] = "Usuário ou Senha Inválido!";
            header("Location: ../pages/login.php");
            exit;
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao acessar o banco de dados: ";
            header("Location: ../pages/login.php");
            exit;
        } finally {
            //Fecha a conexao com o BD
            unset($conexao);
        }
    } else {
        $_SESSION['mensagem'] = "Obrigatório preencher todos os campos!";
        header("Location: ../pages/login.php");
        exit;
    }
}
