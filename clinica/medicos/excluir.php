<?php
include "../conexao.php";

if (!isset($_GET['id'])) {
    die("ID do médico não informado!");
}

$id = $_GET['id'];

$sql = "DELETE FROM medicos WHERE id = $id";

if ($mysqli->query($sql)) {

    header("Location: listar.php");
    exit;
} else {
    print "Erro ao excluir: " . $conn->error;
}
?>
