<?php
session_start();
if (!empty($_SESSION['mensagem'])) {
    unset($_SESSION['mensagem']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>

<body>
    <header>
        <div>
            <h1>Área do Usuário</h1>
            <img src="../img/logoSescSenac.png" alt="">
        </div>
    </header>

    <div class="container">
        <nav>
            <form class="quadrado" method="POST" action="../php/cadastrarAluno.php">
                <div class="title">
                    <h2>Cadastro</h2>
                </div>

                <div class="campos">
                    <input type="text" name="email" placeholder="Email:" required>
                    <input type="password" name="senha" placeholder="Senha:" required>
                    <input type="password" name="confirma_senha" placeholder="Confirmar senha:" required>
                    <input type="text" name="cpf" placeholder="CPF:" required maxlength="11">
                </div>

                <div class="botoes">
                    <button type="submit">Continuar</button>
                    <a  href="./login.php"><button type="button">Cancelar</button></a>
                </div>
            </form>
        </nav>
    </div>
    <footer>
        <figure>
            <img class="tamanhoImg" src="../img/footer.png" alt="">
        </figure>
    </footer>
    <script src="../js/filtroEmail.js"></script>
    <script src="../js/filtroCpf.js"></script>
</body>

</html>