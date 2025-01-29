<?php
if (isset($_POST['submit'])) {
    // Inclui o arquivo de configuração para conexão com o banco de dados
    include('config.php');

    // Obtendo os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $confirmarsenha = $_POST['confirmarsenha'] ?? '';
    $telefone = $_POST['telefone'] ?? '';

    
    if (strlen($senha) < 0) {
        die('A senha deve ter no mínimo 6 caracteres. Cadastro não realizado.');
    }

    if ($senha !== $confirmarsenha) {
        die('As senhas não correspondem. Cadastro não realizado.');
    }

    // Criptografar a senha
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    // Preparar e executar a consulta SQL
    $stmt = $conexao->prepare('INSERT INTO usuarios (nome, email, senha, telefone) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $nome, $email, $senhaHash, $telefone);

    if ($stmt->execute()) {
        header('Location: http://localhost:8000/Massa---Forno/Login.php');
    } else {
        echo 'Erro ao cadastrar usuário.';
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conexao->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <script src="script/Cadastro.js"></script>
    <title>Massa & Forno - Cadastro</title>
</head>
<body>
    <form action="Cadastro.php" method="post" class="form-cadastro">
        <h1>Cadastro</h1>
        <input class="input-style" type="text" name="nome" id="nome" placeholder="Nome" required>
        <input class="input-style" type="text" name="email" id="email" placeholder="Email" required>
        <input class="input-style" type="password" name="senha" id="senha" placeholder="Senha" required>
        <input class="input-style" type="password" name="confirmarsenha" id="confirmar_senha" placeholder="Confirmar Senha" required>
        <input class="input-style" type="text" name="telefone" id="telefone" placeholder="Telefone" required pattern="{9}[0-9]{8}">
        <button class="button_login" type="submit" name ="submit" onclick="validarFormulario(event) " value="Cadastrar">Cadastrar</button>
        <a href="http://localhost:8000/Massa---Forno/Login.php">Já tem uma conta? Faça login</a>
    </form>
</body>
</html>