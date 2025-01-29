<?php


    if(isset($_POST['submit-login']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        include('config.php');
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        
        $sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha'";
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if(password_verify($senha, $user['senha'])){
            echo 'Login realizado com sucesso!';
            
        } else {
            echo 'Email ou senha incorretos.';
        }
        
        $stmt->close();
        $conexao->close();
    }

?>