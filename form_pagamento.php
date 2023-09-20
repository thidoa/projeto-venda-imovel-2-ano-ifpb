<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar pagamento</title>
   <!-- Tirei os dois links que estavam aqui -->
</head>
<body>
    <!-- Não precisa das class container, card-title, mb-3, form-select, form-label, form-control, btn e btn-primary -->
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