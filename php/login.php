<?php 

var_dump($_POST);

session_start();
$_SESSION['mensagem'] = NULL;
$_SESSION['logado'] = FALSE;

 include_once('./data/config.php'); // Certifique-se de que esse arquivo contém a conexão com o BD

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['email']) && !empty($_POST['senha'])) {
        try {
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);

            // Validação de e-mail
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['mensagem'] = "Email inválido!";
                header("Location: ../pages/login.php");
                exit;
            }

            // Consulta para verificar se o usuário existe
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $select = $conexao->prepare($sql);
            $select->bindParam(':email', $email);
            $select->execute();

            if ($select->rowCount() > 0) {
                $login = $select->fetch(PDO::FETCH_ASSOC);

                // Verifica se a senha é correta
                if ($login['email'] === $email && password_verify($senha, $login['senha'])) {
                    $_SESSION['logado'] = TRUE;
                    $_SESSION['idUser'] = $login['id_usuario'];
                    $_SESSION['nome'] = $login['nome'];
                    header("Location: ../pages/cadastrodeClientes.php");
                    exit;
                }
            }

            // Se chegar aqui, o email ou a senha são inválidos
            $_SESSION['mensagem'] = "Usuário ou Senha Inválido!";
            header("Location: ../pages/login.php");
            exit;
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao acessar o banco de dados: " . $e->getMessage(); // Exibe erro em dev
            header("Location: ../pages/login.php");
            exit;
        } finally {
            // Fecha a conexão com o BD
            unset($conexao);
        }
    } else {
        $_SESSION['mensagem'] = "Obrigatório preencher todos os campos!";
        header("Location: ../pages/login.php");
        exit;
    }
}

?>