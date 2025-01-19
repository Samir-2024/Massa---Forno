function validatePassword() {
    console.log('Função validatePassword foi chamada');
    const password = document.getElementById('password').value;
    const passwordConfirm = document.getElementById('password_confirm').value;

    if (password !== passwordConfirm) {
        alert('As senhas não coincidem!');
        return false;
    }

    return true;
}

