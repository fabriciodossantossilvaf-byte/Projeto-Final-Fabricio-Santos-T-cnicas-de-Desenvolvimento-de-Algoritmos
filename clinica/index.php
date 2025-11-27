<?php include "conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Clínica</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-5">

    <h1>Clínica HD</h1>

   <div class="row mb-3">
    <div class="col-md-4">
        <a href="medicos/listar.php" class="btn btn-dark w-100 p-3">Gerenciar Médicos</a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="pacientes/listar.php" class="btn btn-primary w-100 p-3">Gerenciar Pacientes</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
