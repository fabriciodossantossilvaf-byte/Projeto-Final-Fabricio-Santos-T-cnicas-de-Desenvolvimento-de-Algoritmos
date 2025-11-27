<?php
include('../conexao.php');

if (!isset($_GET['id'])) {
    die("ID do paciente não informado!");
}

$id = (int)$_GET['id']; 

$sql = "SELECT * FROM pacientes WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Paciente não encontrado!");
}

$paciente = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $id_medico = $_POST['id_medico'];

    $update = "UPDATE pacientes SET nome = ?, telefone = ?, id_medico = ? WHERE id = ?";
    $stmt = $mysqli->prepare($update);
    $stmt->bind_param("ssii", $nome, $telefone, $id_medico, $id);

    if ($stmt->execute()) {
        header("Location: listar.php?msg=Paciente atualizado com sucesso");
        exit;
    } else {
        print "Erro ao atualizar: " . $stmt->error;
    }
}

$medicos = $mysqli->query("SELECT * FROM medicos");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <h2>Editar Paciente</h2>

    <form method="POST">

        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($paciente['nome']) ?>" required>

        <label class="form-label mt-3">Telefone:</label>
        <input type="text" name="telefone" class="form-control" value="<?= htmlspecialchars($paciente['telefone']) ?>" required>

        <label class="form-label mt-3">Médico Responsável:</label>
        <select name="id_medico" class="form-control" required>
            <?php

                $sqlMedicos = "SELECT * FROM medicos";
                $resultadoMedicos = $mysqli->query($sqlMedicos);

                while ($medico = $resultadoMedicos->fetch_assoc()) {
                    $selecionado = ($medico['id'] == $paciente['id_medico']) ? 'selected' : '';
                    print "<option value='{$medico['id']}' $selecionado>{$medico['nome']}</option>";
                }
            ?>
        </select>


        <button class="btn btn-primary mt-3">Salvar Alterações</button>
    </form>

</body>
</html>
