<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tirei os dois links que estavam aqui -->
    <title>Cadastrar propriedade</title>
</head>
<body>
    <!-- Não precisa das class container, card-title, mb-3, form-label, form-control, form-select, btn e btn-primary -->
    <form action="cadastrar_propriedade.php" method="post" class="container">
        <h1 class="card-title">Cadastrar propriedade</h1>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="exampleFormControlInput1" placeholder="Endereço">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Área</label>
            <input type="number" name="area" class="form-control" id="exampleFormControlInput1" placeholder="Área">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">N° Quartos</label>
            <input type="text" name="quartos" class="form-control" id="exampleFormControlInput1" placeholder="N° Quartos">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Preço R$</label>
            <input type="text" name="preco" class="form-control" id="exampleFormControlInput1" placeholder="Preço R$">
        </div>

        <?php
            include("conexao.php");
            $comando = "SELECT * FROM cliente";

            $users = mysqli_query($conexao, $comando);

            if(mysqli_num_rows($users)) {
                echo "<div class='mb-3'>
                        <label for='floatingSelect'>Cliente</label>
                        <select name='id_cliente' class='form-select' id='floatingSelect' aria-label='Floating label select example'>
                            <option selected>Selecione um Cliente</option>";
                        
                while ($row=mysqli_fetch_assoc($users)) {
                    echo "<option value='" . $row['id_cliente'] . "'>" . $row['nome'] . "</option>";
                }
                
                echo "</select>
                    </div>";
            }
            mysqli_close($conexao);
        ?>

        <button class="btn btn-primary">Cadastrar</button>
    </form>
</body>
</html>