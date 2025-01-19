<?php

    if(isset($_POST['submit'])) 
    {


        include('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmarsenha = $_POST['confirmarsenha'];
        $telefone = $_POST['telefone'];





        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, email, senha, confirmarsenha, telefone) VALUES ('$nome', '$email', '$senha', '$confirmarsenha', '$telefone')");
        $echo = "Cadastro realizado com sucesso";
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
    <php include (conexao.php); ?>

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
        <a href="Login.html">Já tem uma conta? Faça login</a>
    </form>
    
</body>
</html>