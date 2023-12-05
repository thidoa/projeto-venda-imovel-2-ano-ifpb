<?php 
    include('conexao.php');

    if(isset($_POST['email']) || isset($_POST['senha'])) {
        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);
            
            $sql_code = "SELECT * FROM cliente WHERE email = '$email' LIMIT 1";

            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            $usuario = $sql_query->fetch_assoc();
            if(password_verify($senha, $usuario['senha'])) {
                if(!isset($_SESSION)) {
                    session_start();
                }
        
                $_SESSION['id'] = $usuario['id_cliente'];
                $_SESSION['nome'] = $usuario['nome'];
        
                header("Location: home.php");
            } else {
                echo "Falha ao logar! E-mail ou senha incorretos";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Login</h1>

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">

        <button type="submit">LOGAR</button>
    </form>
</body>
</html>