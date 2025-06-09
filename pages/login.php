<?php
// CONEXÃO
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "site_matricula_sesc";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$msg = "";

// LOGIN
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Protege contra SQL Injection
    $email = $conexao->real_escape_string($email);
    $senha = $conexao->real_escape_string($senha);

    // Verifica no banco
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows == 1) {
        header("Location: matricula.php");
        exit;
    } else {
        $msg = "Email ou senha inválidos!";
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
        <div class="quadrado">
            <div class="title">
                <h2>Login</h2>
            </div>
                
            <div class="campos">
                <input type="text" placeholder="Email:">
                <input type="password" placeholder="Senha:">
            </div>
            <div class="botoes">
                <a href="./matricula.php"><button>Continuar</button></a>
                <a href="../index.php"><button>Cancelar</button></a>
            </div>
            <div class="accont">
                <a href="./cadastro.php">Não tem uma conta? <br> Cadastre-se já.</a>
            </div>
        </div>
    </nav>


    </div>
    <footer>
      <div class="rodape">
        <img
          class="alterarTamanhoImg"
          src="../img/footer.png"
          alt=""
        />
      </div>
    </footer>
</body>

</html>