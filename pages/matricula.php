<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("./php/data/config.php");


  // Pegando os dados do formulário
  $nome_completo = $_POST['nome_completo'];
  $cpf = $_POST['cpf'];
  $rg = $_POST['rg'];
  $sus = $_POST['sus'];
  $data_nascimento = $_POST['data_nascimento'];
  $sexo = $_POST['sexo'];
  $nacionalidade = $_POST['nacionalidade'];

  // Usando prepared statement (segurança)
  $sql = "INSERT INTO matriculas (nome_completo, cpf, rg, sus, data_nascimento, sexo, nacionalidade)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  if ($stmt) {
    $stmt->bind_param("sssssss", $nome_completo, $cpf, $rg, $sus, $data_nascimento, $sexo, $nacionalidade);

    if ($stmt->execute()) {
      header("Location: matriculaRealizada.php");
      exit();
    } else {
      echo "Erro ao salvar: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Erro na preparação da query: " . $conn->error;
  }

  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Área do Usuário</title>
  <link rel="stylesheet" href="../css/matricula.css" />
</head>

<body>
  <div class="cabecalho">
    <h2>Área do usuário</h2>
    <img src="../img/logoSescSenac.png" alt="logoSescSenac" />
  </div>

  <section>
    <div class="quadrado">
      <h3 class="login">Matrícula</h3>

      <form action="../php/salvarMatricula.php" method="POST">
        <div class="form-container">
          <div class="form-group">
            <input type="text" name="nome_completo" placeholder="Nome completo:" required>
            <input type="text" name="cpf" placeholder="CPF:" required maxlength="11">
            <input type="text" name="rg" placeholder="N° do RG ou certidão de nascimento:">
            <input type="text" name="sus" placeholder="N° do cartão do SUS:" maxlength="15">
          </div>

          <div class="form-group">
            <input type="date" name="data_nascimento" required>
            <select type="text" name="sexo" placeholder="Sexo:" required="required">
              <option value="">Sexo:</option>
              <option value="masculino">Masculino</option>
              <option value="feminino">Feminino</option>
              <option value="naoBinario">Não Binário</option>
              <option value="outro">Outro</option>
            </select>
            <input type="text" name="nacionalidade" placeholder="Nacionalidade:" required>
          </div>
        </div>

        <nav>
          <button type="submit">Continuar</button>
          <a href="./login.php"><button type="button">Cancelar</button></a>
        </nav>
      </form>

    </div>
  </section>

  <footer>
    <div class="rodape">
      <img class="alterarTamanhoImg" src="../img/footer.png" alt="" />
    </div>
  </footer>
</body>

  <script src="../js/filtroCpf.js"></script>
  <script src="../js/filtroRg.js"></script>
  <script src="../js/filtroSus.js"></script>

</html>