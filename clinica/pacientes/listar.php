<?php
include "../conexao.php";

$sql = "SELECT * FROM pacientes";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Pacientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2 class="mb-4">Pacientes Cadastrados</h2>

<a href="cadastrar.php" class="btn btn-dark mb-3">Novo Paciente</a>
<a href="../index.php" class="btn btn-secondary mb-3">Voltar ao Início</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nome'] ?></td>
            <td><?= $row['telefone'] ?></td>
            <td>
                <a href="editar.php?id=<?php print $row['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="excluir.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir paciente?');">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

</body>
</html>
