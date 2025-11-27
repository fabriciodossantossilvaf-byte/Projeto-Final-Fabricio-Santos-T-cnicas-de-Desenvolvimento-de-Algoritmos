<?php
include "../conexao.php";

// Verifica se recebeu o ID
if (!isset($_GET['id'])) {
    die("ID do médico não informado!");
}

$id = $_GET['id'];

$sql = "SELECT * FROM medicos WHERE id = $id";
$result = $mysqli->query($sql);

if ($result->num_rows == 0) {
    die("Médico não encontrado!");
}

$medico = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Médico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Editar Médico</h2>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nome do Médico:</label>
            <input type="text" name="nome" value="<?= $medico['nome'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Especialidade:</label>
            <input type="text" name="especialidade" value="<?= $medico['especialidade'] ?>" class="form-control" required>
        </div>

        <button type="submit" name="atualizar" class="btn btn-success">Atualizar</button>
        <a href="listar.php" class="btn btn-secondary">Voltar</a>
    </form>

    <?php
    if (isset($_POST['atualizar'])) {
        $nome = $_POST['nome'];
        $esp  = $_POST['especialidade'];

        $sql_up = "UPDATE medicos SET nome='$nome', especialidade='$esp' WHERE id=$id";

        if ($mysqli->query($sql_up)) {
            print "<div class='alert alert-success mt-3'>Médico atualizado com sucesso!</div>";
        } else {
            print "<div class='alert alert-danger mt-3'>Erro: " . $conn->error . "</div>";
        }
    }
    ?>

</div>

</body>
</html>
