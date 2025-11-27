<?php include "../conexao.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Médico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Cadastrar Médico</h2>

    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Nome do Médico:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Especialidade:</label>
            <input type="text" name="especialidade" class="form-control" required>
        </div>

        <button type="submit" name="salvar" class="btn btn-success">Salvar</button>
        <a href="listar.php" class="btn btn-secondary">Voltar</a>
    </form>

    <?php
    if (isset($_POST['salvar'])) {
        $nome = $_POST['nome'];
        $esp  = $_POST['especialidade'];

        $sql = "INSERT INTO medicos (nome, especialidade) VALUES ('$nome', '$esp')";

        if ($mysqli->query($sql)) {
            print "<div class='alert alert-success mt-3'>Médico cadastrado com sucesso!</div>";
        } else {
            print "<div class='alert alert-danger mt-3'>Erro: " . $conn->error . "</div>";
        }
    }
    ?>

</div>

</body>
</html>
