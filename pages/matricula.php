<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Área do Usuário</title>
    <link rel="stylesheet" href="../css/matricula.css" />
  </head>
  <body>
    <div class="cabecalho">
      <h2>Área do usuário</h2>
      <div class="separa"></div>
      <img src="../img/logoSescSenac.png" alt="logoSescSenac" />
    </div>

    <section>
      <div class="quadrado">

        <h3 class="login">Matricula</h3>
        <!--Formuçários-->

        <div class="form-container">
          <div class="form-group">
            <input
              type="text"
              id="nome"
              name="nome"
              placeholder="Nome completo:"
            />

            <input type="number" id="cpf" name="cpf" placeholder="CPF:" />

            <input
              type="number"
              id="rg"
              name="rg"
              placeholder="N° do rg ou certidão de nascimento:"
            />

            <input
              type="number"
              id="sus"
              name="sus"
              placeholder="N° do cartão do sus (opcional):"
            />
          </div>

          <div class="form-group">
            <input
              type="date"
              id="data-nascimento"
              name="data-nascimento"
              placeholder="Data de nascimento:"
            />

            <input type="text" id="sexo" name="sexo" placeholder="Sexo:" />

            <input
              type="text"
              id="nacionalidade"
              name="nacionalidade"
              placeholder="Nacionalidade:"
            />
          </div>
        </div>

        <!--Botões-->

        <nav>
          <a href="./matriculaRealizada.php"><button>Continuar</button></a>
          <a href="./login.php"><button>Cancelar</button></a>
        </nav>

      </div>
    </section>

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