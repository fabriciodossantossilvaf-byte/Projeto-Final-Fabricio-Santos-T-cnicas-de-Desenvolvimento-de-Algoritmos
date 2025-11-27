<?php
include "../conexao.php";
$result = $mysqli->query("SELECT * FROM medicos");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Médicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Lista de Médicos</h2>

    <a href="cadastrar.php" class="btn btn-dark mb-3">Cadastrar Médico</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($m = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $m['id'] ?></td>
                <td><?= $m['nome'] ?></td>
                <td><?= $m['especialidade'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="excluir.php?id=<?= $m['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="../index.php" class="btn btn-secondary mt-3">Voltar</a>
</div>

</body>
</html>
