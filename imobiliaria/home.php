<?php 
    include('protect.php');
    include('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    Bem vindo a imobiliária, <?php echo $_SESSION['nome']?>.
    <p>
        <a href="cadastrar_propriedade.php" class="btn btn-info">Cadastrar propriedade</a>
    </p>    
    <p>
        <a href="logout.php">Sair</a>
    </p>
    <p>Suas Propriedades</p>
    <table border="1">
        <thead>
            <tr>
                <th>Endereço</th>
                <th>Área(m²)</th>
                <th>Numero de quartos</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $cliente_id = $_SESSION['id'];
            $comando =  "SELECT * FROM propriedades WHERE id_cliente = $cliente_id";
            $sql_query = $mysqli->query($comando) or die("ERRO ao consultar! " . $mysqli->error);
        
            if($sql_query->num_rows == 0) {
                echo "Nenhuma propriedade cadastrada!";
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>

                    <tr>
                       
                        <td>
                            <?php echo $dados['endereco']; ?>
                        </td>
                        <td>
                            <?php echo $dados['area']; ?>
                        </td>
                        <td>
                            <?php echo $dados['numero_quartos']; ?>
                        </td>
                        <td>
                            <?php echo $dados['preco']; ?>
                        </td>
                    </tr>

                    <?php
                }
            }
        ?>
        </tbody>
    </table>
</body>
</html>