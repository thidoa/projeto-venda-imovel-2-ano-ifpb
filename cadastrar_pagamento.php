<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include("conexao.php");

    $id_contrato = $_POST['id_contrato'];
    $data_pagamento = $_POST['data_pagamento'];
    $valor_pago = $_POST['valor_pago'];

    $comando = "INSERT INTO pagamento (id_contrato, data_pagamento, valor_pago) VALUES ('$id_contrato', '$data_pagamento', $valor_pago)";

    if(mysqli_query($conexao, $comando)) {
        echo "Pagamento cadastrado com sucesso<br>";
        echo "<a href='index.html'>Voltar para o inicio</a>";
    } else {
        echo "Erro: " . mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>