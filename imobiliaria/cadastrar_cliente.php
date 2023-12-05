<?php

    include("conexao.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $confirmacao_senha = $_POST['confirmacao_senha'];

        $verify_email = "SELECT * FROM cliente WHERE email = '$email'";
        $result = $mysqli->query($verify_email);

        if($result->num_rows > 0) {
            echo "O email ja está em uso. Por favor escolher outro email";
            echo "<a href='index.php'>Voltar para o inicio</a>";
        } else {
            if ($senha == $confirmacao_senha) {
                $hash = password_hash($senha, PASSWORD_DEFAULT);
    
                $comando = "INSERT INTO cliente (nome, sobrenome, email, telefone, senha) VALUES ('$nome', '$sobrenome', '$email', '$telefone', '$hash')";

                
            } else {
                echo "Senha não são iguais";
                echo "<a href='index.php'>Voltar para o inicio</a>";
            }

           
            if($mysqli->query($comando) === TRUE) {
                echo "Usuário cadastrado com sucesso";
                echo "<a href='index.php'>Voltar para o inicio</a>";
            } else {
                echo "Erro ao cadastrar a pessoa: " . $mysqli->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>

    <form action="" method="post">
        <h1>Cadastrar</h1>
        <div>
            <label>Nome</label>
            <input type="text" name="nome" placeholder="Nome">
        </div>
        <div>
            <label>Sobrenome</label>
            <input type="tet" name="sobrenome" placeholder="Sobrenome">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div>
            <label>Telefone</label>
            <input type="text" name="telefone" placeholder="Telefone">
        </div>
        <div>
            <label>Senha</label>
            <input type="password" name="senha" placeholder="Senha">
        </div>
        <div>
            <label>Confirmação de senha</label>
            <input type="password" name="confirmacao_senha" placeholder="Confirmação de senha">
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>