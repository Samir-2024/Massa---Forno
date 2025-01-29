// Função para obter parâmetros da URL
function getQueryParameter(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

// Recuperar o valor do parâmetro "timerDuration"
const timerDuration = getQueryParameter("timerDuration");

if (timerDuration) {
    console.log(`Valor recebido: ${timerDuration}`);
    // Utilize o valor como preferir
} else {
    console.log("Nenhum valor recebido na URL.");
}
