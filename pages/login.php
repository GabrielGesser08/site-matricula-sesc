
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
            <form   method="POST" class="quadrado">
                <div class="title">
                    <h2>Login</h2>
                </div>

                <div class="campos">
                    <input type="text" name="email" placeholder="Email:">
                    <input type="password" name="senha" placeholder="Senha:">
                </div>
                <div class="botoes">
                    <a href="./matricula.php">Continuar</a>
                    <a href="../index.php">Cancelar</a>
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

    <script src="../js/filtroEmail.js"></script>
</body>

</html>