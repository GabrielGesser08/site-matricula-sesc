<<<<<<< HEAD

=======
<?php
include("../conexao.php");

session_start();
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM administradores WHERE usuario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $admin = $resultado->fetch_assoc();
        if (password_verify($senha, $admin['senha'])) {
            $_SESSION['admin'] = $admin['usuario'];
            header("Location: painel_administrador.php");
            exit();
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Usuário não encontrado.";
    }
}
?>
>>>>>>> 9495b1a75d86f3c1b4ed49c5866790fb009c2844

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login para Adiministrador</title>
    <link rel="stylesheet" href="../css/administrador.css">
</head>
<body>
    <header>
    <div>
        <h1>Área do Administrador</h1>
        <img src="../img/logoSescSenac.png" alt="">
    </div>
    </header>

    <div class="container">
        <nav>
        <div class="quadrado">
            <div class="title">
                <h2>Login</h2>
            </div>
                
            <div class="campos">
                <input type="text" placeholder="Email:">
                <input type="password" placeholder="Senha:">
            </div>
            <div class="botoes">
                <a href="./PgInicialAdministrador.php"><button>Continuar</button></a>
                <a href="../index.php"><button>Cancelar</button></a>
            </div>
            
        </div>
    </nav>
    </div>
    <footer>
        <figure>
            <img class="tamanhoImg" src="../img/footer.png" alt="">
        </figure>
    </footer>
</body>
</html>