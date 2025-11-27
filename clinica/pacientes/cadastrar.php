<?php
include "../conexao.php";

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO pacientes (nome, telefone) VALUES ('$nome', '$telefone')";
    
    if ($mysqli->query($sql)) {
        $mensagem = "Paciente cadastrado com sucesso!";
    } else {
        $mensagem = "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Paciente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2 class="mb-3">Cadastrar Paciente</h2>

<?php if ($mensagem): ?>
<div class="alert alert-info"><?= $mensagem ?></div>
<?php endif; ?>

<form method="POST">
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control" required>
    </div>

    <button class="btn btn-primary">Salvar</button>
    <a href="listar.php" class="btn btn-secondary">Voltar</a>
</form>

</body>
</html>
