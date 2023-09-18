<?php
    //conexão com o banco de dados
    $hostname = "localhost";
    $bancodedados = "empresateste";
    $usuario = "root";
    $senha = "";

    $conexao = mysqli_connect($hostname, $usuario, $senha, $bancodedados);
    if(!$conexao) {
        die("Houve um erro: ".mysqli_connect_error());
    }
?>