<?php
    include("conexao.php");

    $endereco = $_POST['endereco'];
    $area = $_POST['area'];
    $quartos = $_POST['quartos'];
    $preco = $_POST['preco'];
    $id_cliente = $_POST['id_cliente'];

    $comando = "INSERT INTO propriedades (id_cliente, endereco, area, numero_quartos, preco) VALUES ('$id_cliente', '$endereco', $area, $quartos, $preco)";

    if(mysqli_query($conexao, $comando)) {
        echo "Propriedade cadastrado com sucesso<br>";
        echo "<a href='index.html'>Voltar para o inicio</a>";
    } else {
        echo "Erro: " . mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>