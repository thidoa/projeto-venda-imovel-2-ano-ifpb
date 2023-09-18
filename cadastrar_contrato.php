<?php
    include("conexao.php");

    $id_propriedades = $_POST['id_propriedades'];
    $id_corretor = $_POST['id_corretor'];
    $data_inicio = $_POST['data_inicio'];
    $data_termino = $_POST['data_termino'];
    $valor_contrato = $_POST['valor_contrato'];

    $comando = "INSERT INTO contrato (id_propriedades, id_corretor, data_inicio, data_termino, valor_contrato) VALUES ('$id_propriedades', '$id_corretor', '$data_inicio', '$data_termino', $valor_contrato)";

    if(mysqli_query($conexao, $comando)) {
        echo "Contrato cadastrado com sucesso<br>";
        echo "<a href='index.html'>Voltar para o inicio</a>";
    } else {
        echo "Erro: " . mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>