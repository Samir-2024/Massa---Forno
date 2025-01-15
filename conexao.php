<?php

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost:3307';

$mysqli = new mysqli($host, $usuario, $senha, $database);


if($mysqli->error) {
    die ( "Erro ao conectar ao banco de dados: " . $mysqli->error);
}


if(isset($_POST['email'])) {

    if(strlen($_Post['email']) == 0) {
        echo "Preencha o campo email";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha o campo senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ");	
    
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            
        } else {
            echo "Usuário ou senha inválidos";
        }	
    
    }
    

}