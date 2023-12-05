<?php
    include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de imóvel</title>
</head>
<body >
    <main>
        <a href="form_login.php" class="btn btn-info">Login</a>
        <a href="cadastrar_cliente.php" class="btn btn-info">Cadastrar-se</a>
    </main>

    <table border="1">
        <thead>
            <tr>
                <th>Proprietário</th>
                <th>Endereço</th>
                <th>Área(m²)</th>
                <th>Numero de quartos</th>
                <th>Preço</th>
                <th>Telefone</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $comando =  "SELECT propriedades.*, cliente.nome AS nome_cliente, cliente.telefone AS telefone_contato
            FROM propriedades
            LEFT JOIN cliente ON propriedades.id_cliente = cliente.id_cliente";

            $sql_query = $mysqli->query($comando) or die("ERRO ao consultar! " . $mysqli->error);
        
            if($sql_query->num_rows == 0) {
                echo "Nenhuma propriedade cadastrada!";
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $dados['nome_cliente'] ?>
                        </td>
                        <td>
                            <?php echo $dados['endereco'] ?>
                        </td>
                        <td>
                            <?php echo $dados['area'] ?>
                        </td>
                        <td>
                            <?php echo $dados['numero_quartos'] ?>
                        </td>
                        <td>
                            <?php echo $dados['preco'] ?>
                        </td>
                        <td>
                            <?php echo $dados['telefone_contato'] ?>
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