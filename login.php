<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Login.css">
    <title>Massa & Forno - Cadastro</title>
    <script src="script/login.js" defer></script>
</head>

<body>
    <div class="container_cadastro">
        <form action="processar_cadastro.php" method="post" onsubmit="return validatePassword();">
            <p>Usuário</p>
            <input class="input_cadastro" type="text" name="usuario" required id="name">

            <p>E-mail</p>
            <input class="input_cadastro" type="email" name="email" required id="email">

            <p>Senha</p>
            <input class="input_cadastro" type="password" name="senha" required id="password">

            <p>Confirme sua senha</p>
            <input class="input_cadastro" type="password" name="senha_confirm" required id="password_confirm">

            <p>Número de Telefone</p>
            <input class="input_cadastro" type="tel" name="telefone" required id="phone" pattern="[0-9]{11}" title="Insira o número com 11 dígitos, incluindo o DDD.">

            <button type="submit" class="button">Cadastrar</button>
        </form>
    </div>

    <div class="container_login">
        <form action="processar_login.php" method="post">
            <p>Usuário</p>
            <input class="input_cadastro" type="text" name="usuario" required>

            <p>Senha</p>
            <input class="input_cadastro" type="password" name="senha" required>

            <button type="submit" class="button">Login</button>
        </form>
    </div>
</body>

</html>
