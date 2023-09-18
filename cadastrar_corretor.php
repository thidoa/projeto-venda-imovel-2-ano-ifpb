<?php
    include("conexao.php");

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $comando = "INSERT INTO corretor (nome, sobrenome, email, telefone) VALUES ('$nome', '$sobrenome', '$email', '$telefone')";

    if(mysqli_query($conexao, $comando)) {
        echo "Corretor cadastrado com sucesso<br>";
        echo "<a href='index.html'>Voltar para o inicio</a>";
    } else {
        echo "Erro: " . mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>