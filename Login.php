<?php
    session_start();

    // Redireciona se o usuário já estiver logado
    if (isset($_SESSION["submit-login"])) {
        header('Location: informacoes.html');
        exit();
    }

    // Processa o login se os dados forem enviados
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = trim($_POST["email"]);
        $senha = trim($_POST["senha"]);

        // Exemplo de verificação estática (troque por validação no banco de dados)
        $email_valido = "usuario@exemplo.com";
        $senha_valida = "Shadowrule"; // Ideal: Use senha com hash (password_hash)

        if ($email === $email_valido && $senha === $senha_valida) {
            $_SESSION["submit-login"] = true;
            header('Location: informacoes.html');
            exit();
        } else {
            $erro = "Email ou senha inválidos.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Massa & Forno - Login</title>
    <link rel="stylesheet" href="css/form-login.css">
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <form action="" method="post" class="form-cadastro">
        <h1>Login</h1>
        <?php if (isset($erro)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($erro); ?></p>
        <?php endif; ?>
        <input class="input-style" type="text" name="email" id="email" placeholder="Email" required>
        <input class="input-style" type="password" name="senha" id="senha" placeholder="Senha" required>
        <button type="submit" class="button_login">Entrar</button>
    </form>
</body>
</html>
