const canvas = document.getElementById('roleta');
const ctx = canvas.getContext('2d');
const numSetores = 8;
const cores = ["#FF5733", "#FFBD33", "#33FF57", "#33FFF6", "#3375FF", "#8D33FF", "#F333FF", "#FF3380"];
const textos = ["aluno x", "aluno x", "aluno x", "aluno x", "aluno x", "aluno x", "aluno x", "aluno x"];
let anguloAtual = 0;

desenharRoleta();

function desenharRoleta() {
    const raio = canvas.width / 2;
    const anguloPorSetor = (2 * Math.PI) / numSetores;

    for (let i = 0; i < numSetores; i++) {
        const anguloInicial = i * anguloPorSetor;
        const anguloFinal = anguloInicial + anguloPorSetor;

        ctx.beginPath();
        ctx.moveTo(raio, raio);
        ctx.arc(raio, raio, raio, anguloInicial, anguloFinal);
        ctx.closePath();
        ctx.fillStyle = cores[i % cores.length];
        ctx.fill();

        // Texto
        ctx.save();
        ctx.translate(raio, raio);
        ctx.rotate(anguloInicial + anguloPorSetor / 2);
        ctx.textAlign = "right";
        ctx.fillStyle = "#000";
        ctx.font = "16px Arial";
        ctx.fillText(textos[i], raio - 10, 5);
        ctx.restore();
    }

    // Centro
    ctx.beginPath();
    ctx.arc(raio, raio, 30, 0, 2 * Math.PI);
    ctx.fillStyle = "#fff";
    ctx.fill();
    ctx.stroke();
}

function girar() {
    const rotacaoExtra = Math.random() * 360 + 720; // 2 voltas completas no mínimo
    anguloAtual += rotacaoExtra;
    canvas.style.transition = "transform 4s ease-out";
    canvas.style.transform = `rotate(${anguloAtual}deg)`;

    setTimeout(() => {
        canvas.style.transition = "none";
        anguloAtual = anguloAtual % 360;
        canvas.style.transform = `rotate(${anguloAtual}deg)`;
    }, 4000);
}
