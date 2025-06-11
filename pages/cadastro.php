

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
        <form class="quadrado">
            <div class="title">
                <h2>Cadastro</h2>
            </div>
                
            <div class="campos">
                <input type="text" name="email" placeholder="Email:">
                <input type="password" name="senha" placeholder="Senha:">
                <input type="password" name="confirma_senha" placeholder="Confirmar senha:">
                <input type="cpf" name="cpf" placeholder="CPF:">
            </div>
            <div class="botoes">
                <a href="./cadastroSucesso.php"><button>Continuar</button></a>
                <a href="./login.php"><button>Cancelar</button></a>
            </div>
        </form>
    </nav>
    </div>
    <footer>
        <figure>
            <img class="tamanhoImg" src="../img/footer.png" alt="">
        </figure>
    </footer>
</body>

</html>