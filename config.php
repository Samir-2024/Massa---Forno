<?php

    $dbHost = 'localhost:3307';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'usuarios';
    


    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if($conexao->connect_errno){
       echo "Erro";
    }
    else
    {
        echo "Erro ao Cadastrar";
    }
?>