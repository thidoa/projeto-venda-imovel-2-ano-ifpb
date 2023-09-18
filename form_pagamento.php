<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar pagamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <form action="cadastrar_pagamento.php" method="post" class="container">
        <h1 class="card-title">Cadastrar pagamento</h1>
        <?php
            include("conexao.php");

            // Contrato
            $comando = "SELECT * FROM contrato";
            $users = mysqli_query($conexao, $comando);
            if(mysqli_num_rows($users)) {
                echo "<div class='mb-3'>
                        <label for='floatingSelect'>Contrato</label>
                        <select name='id_contrato' class='form-select' id='floatingSelect' aria-label='Floating label select example'>
                            <option selected>Selecione um contrato</option>";
                while ($row=mysqli_fetch_assoc($users)) {
                    echo "<option value='" . $row['id_contrato'] . "'>" . $row['id_contrato'] . "</option>";
                }
                echo "</select>
                    </div>";
            }

            mysqli_close($conexao);
        ?>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Data de pagamento</label>
            <input type="date" name="data_pagamento" class="form-control" id="exampleFormControlInput1" placeholder="Data de pagamento">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Valor pago</label>
            <input type="number" name="valor_pago" class="form-control" id="exampleFormControlInput1" placeholder="Valor pago">
        </div>

        <button class="btn btn-primay">Cadastrar</button>
    </form>
</body>
</html>