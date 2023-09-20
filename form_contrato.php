<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar contrato</title>
    <!-- Tirei os dois links que estavam aqui -->
</head>
<body>
    <!-- Não precisa da class container -->
    <form action="cadastrar_contrato.php" method="post" class="container">
        <!-- não precisa da class card-title -->
        <h1 class="card-title">Cadastrar contrato</h1>
        <?php
            include("conexao.php");

            // Propriedades
            $comando = "SELECT * FROM propriedades";
            $users = mysqli_query($conexao, $comando);
            if(mysqli_num_rows($users)) {
                // não precisa da class mb-3 e form-select
                echo "<div class='mb-3'>
                        <label for='floatingSelect'>Cliente</label>
                        <select name='id_propriedades' class='form-select' id='floatingSelect' aria-label='Floating label select example'>
                            <option selected>Selecione uma Propriedade</option>";
                while ($row=mysqli_fetch_assoc($users)) {
                    echo "<option value='" . $row['id_propriedades'] . "'>" . $row['endereco'] . "</option>";
                }
                echo "</select>
                    </div>";
            }

            // Corretor
            $comando = "SELECT * FROM corretor";
            $users = mysqli_query($conexao, $comando);
            if(mysqli_num_rows($users)) {
                // não precisa da class mb-3 e form-select
                echo "<div class='mb-3'>
                        <label for='floatingSelect'>Cliente</label>
                        <select name='id_corretor' class='form-select' id='floatingSelect' aria-label='Floating label select example'>
                            <option selected>Selecione um corretor</option>";
                while ($row=mysqli_fetch_assoc($users)) {
                    echo "<option value='" . $row['id_corretor'] . "'>" . $row['nome'] . "</option>";
                }
                echo "</select>
                    </div>";
            }
            mysqli_close($conexao);
        ?>
        <!-- não precisa das class mb-3, form-label, form-control em todas essas divs, labels e inputs -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Data de inicio</label>
            <input type="date" name="data_inicio" class="form-control" id="exampleFormControlInput1" placeholder="Data de inicio">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Data de término</label>
            <input type="date" name="data_termino" class="form-control" id="exampleFormControlInput1" placeholder="Data de término">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Valor do contrato</label>
            <input type="number" name="valor_contrato" class="form-control" id="exampleFormControlInput1" placeholder="Valor do contrato">
        </div>
        <!-- Não precisa da class btn e btn-primary -->
        <button class="btn btn-primary">Cadastrar</button>
    </form>
</body>
</html>