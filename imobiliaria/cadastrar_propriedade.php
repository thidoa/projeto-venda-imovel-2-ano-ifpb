<?php
    include('protect.php');
    include("conexao.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $endereco = $_POST['endereco'];
        $area = $_POST['area'];
        $quartos = $_POST['quartos'];
        $preco = $_POST['preco'];
        $id_cliente = $_POST['id_cliente'];

        $comando = "INSERT INTO propriedades (id_cliente, endereco, area, numero_quartos, preco) VALUES ('$id_cliente', '$endereco', $area, $quartos, $preco)";

        if($mysqli->query($comando) === TRUE) {
            header("Location: home.php");
        } else {
            echo "Erro ao cadastrar a pessoa: " . $mysqli->error;
        }
    }
    
    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar propriedade</title>
</head>
<body>

    <form action="" method="post">
        <h1>Cadastrar propriedade</h1>
        <div>
            <label>Endereço</label>
            <input type="text" name="endereco" placeholder="Endereço">
        </div>
        <div>
            <label>Área</label>
            <input type="number" name="area" placeholder="Área">
        </div>
        <div>
            <label>N° Quartos</label>
            <input type="text" name="quartos" placeholder="N° Quartos">
        </div>
        <div>
            <label>Preço R$</label>
            <input type="text" name="preco" placeholder="Preço R$">
        </div>
        <div>
            <?php echo '<input type="text" name="id_cliente" value="' . $_SESSION['id'] . '" hidden>'; ?>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>