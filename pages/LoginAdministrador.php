<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login para Administrador</title>
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
                <form method="POST" action="">
                    <div class="campos">
                        <input type="text" name="email" placeholder="Email:" required>
                        <input type="password" name="senha" placeholder="Senha:" required>
                    </div>
                    <div class="botoes">
                        <a href="../pages/PgInicialAdministrador.php"><button type="button">Continuar</button></a>
                        <a href="../index.php"><button type="button">Cancelar</button></a>
                    </div>
                </form>
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
