function validarEmail() {
    const email = document.getElementById('email').value;
    if (!email.includes('@') ) {
        alert('Endereço de Email inválido');
        return false;
    }
    return true;
}
function validarSenha() {
    const senha = document.getElementById('senha').value;
    const confirmarSenha = document.getElementById('confirmarSenha').value;

    if (senha != confirmarSenha) {
        alert('Senhas diferentes');
        return false;
    }

    return true;
}

function validarFormulario() {
    const emailValido = validarEmail();
    const senhaValida = validarSenha();

    if (!emailValido || !senhaValida) {
        alert('Seu cadastro não foi realizado');
        return false;
    }
}




