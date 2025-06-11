<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("./php/data/config.php");

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $perfil = filter_input(INPUT_POST, 'perfil', FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO usuarios (email, senha, perfil) VALUES (:email, :senha, :perfil)";

    try {
        $stmt = $conexao->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':perfil', $perfil);

        // Executa e redireciona se ok
        if ($stmt->execute()) {
            header("Location: salavar_aluno.php");
            exit();
        } else {
            echo "Erro ao salvar.";
        }
    } catch (PDOException $e) {
        echo "Erro na query: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <header>
        <h1>Área do Usuário</h1>
        <img src="../img/logoSescSenac.png" alt="">
    </header>

    <div class="container">
        <nav>
            <form  action="../php/salvar_aluno.php" method="POST" class="quadrado">
                <div class="title">
                    <h2>Login</h2>
                </div>

                <div class="campos">
                    <input type="text" name="email" placeholder="Email:">
                    <input type="password" name="senha" placeholder="Senha:">
                </div>
                <div class="botoes">
                    <a href="./matricula.php"><button>Continuar</button></a>
                    <a href="../index.php"><button>Cancelar</button></a>
                </div>
                <div class="accont">
                    <a href="./cadastro.php">Não tem uma conta? <br> Cadastre-se já.</a>
                </div>
            </form>
        </nav>


    </div>
    <footer>
        <div class="rodape">
            <img
                class="alterarTamanhoImg"
                src="../img/footer.png"
                alt="" />
        </div>
    </footer>
</body>

</html>