<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Sorteados</title>
    <link rel="stylesheet" href="../css/sorteioAluno.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 id="title">Lista de Alunos Sorteados</h1>
            <img class="logo" src="../img/logoSescSenac.png" alt="">
        </header>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome do Aluno</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexão com o banco de dados
                $host = "localhost";
                $usuario = "root";
                $senha = "";
                $banco = "site_matricula_sesc";

                $conexao = new mysqli($host, $usuario, $senha, $banco);

                if ($conexao->connect_error) {
                    die("Erro na conexão: " . $conexao->connect_error);
                }

                // Buscar todos os alunos cadastrados
                $sql = "SELECT id_matricula, nome_completo FROM matriculas";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    $alunos = [];

                    while ($linha = $resultado->fetch_assoc()) {
                        $alunos[] = $linha;
                    }

                    if (count($alunos) < 30) {
                        echo "<tr><td colspan='3'>Não há alunos suficientes para o sorteio.</td></tr>";
                    } else {
                        $indicesSorteados = array_rand($alunos, 30);

                        if (!is_array($indicesSorteados)) {
                            $indicesSorteados = [$indicesSorteados];
                        }

                        $contador = 1;

                        foreach ($indicesSorteados as $indice) {
                            $nome = $conexao->real_escape_string($alunos[$indice]['nome_completo']);
                            $sqlInsert = "INSERT INTO sorteados (nome_completo) VALUES ('$nome')";
                            
                            if ($conexao->query($sqlInsert) === TRUE) {
                                echo "<tr>";
                                echo "<td>" . $contador++ . "</td>";
                                echo "<td>" . htmlspecialchars($nome) . "</td>";
                                echo "<td><span class='status'>Selecionado</span></td>";
                                echo "</tr>";
                            } else {
                                echo "<tr><td colspan='3'>Erro ao cadastrar '$nome': " . $conexao->error . "</td></tr>";
                            }
                        }
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum aluno encontrado na tabela de matriculas.</td></tr>";
                }

                $conexao->close();
                ?>
            </tbody>
        </table>
        <a class="btn-voltar" href="../pages/PgInicialAdministrador.php"><button>Voltar</button></a>
    </div>
</body>
</html>