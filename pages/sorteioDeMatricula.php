

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio de Matrícula - Sesc Senac</title>
    <link rel="stylesheet" href="../css/sorteioDeMatricula.css">
</head>

<body>
    <div class="container">
        <!-- Área da roleta -->
        <div class="estrutura">
            <div class="roleta-area">
                <h2><i>Sorteio de matrícula</i></h2>
                <canvas id="roleta" width="400" height="400"></canvas>
                <div class="botao">
                    <button onclick="girar()">Roletar</button>
                </div>
            </div>

            <!-- Lista de alunos -->
             
            <div class="lista">
                <div>Aluno: x - <span class="status">Concorrendo</span></div>
                <div>Aluno: x - <span class="status">Concorrendo</span></div>
                <div>Aluno: x - <span class="status">Concorrendo</span></div>
                <div>Aluno: x - <span class="status">Concorrendo</span></div>
                <div>Aluno: x - <span class="status">Concorrendo</span></div>
                <div>Aluno: x - <span class="status">Concorrendo</span></div>
                <div>Aluno: x - <span class="status">Concorrendo</span></div>
                <br>
                <strong>Alunos selecionados: 40</strong>
                <br><br>
                <button>Continuar</button>
            </div>
        </div>

    </div>

    <script src="../js/roleta.js"></script>
</body>

</html>
