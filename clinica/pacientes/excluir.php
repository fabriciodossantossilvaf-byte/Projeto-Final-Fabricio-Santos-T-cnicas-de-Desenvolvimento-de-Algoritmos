<?php
include '../conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pacientes WHERE id = $id";

    if ($mysqli->query($sql) === TRUE) {
        print "<script>alert('Paciente excluído com sucesso!'); window.location='listar.php';</script>";
    } else {
        print "Erro ao excluir: " . $conn->error;
    }
} else {
    print "ID não informado!";
}
?>
