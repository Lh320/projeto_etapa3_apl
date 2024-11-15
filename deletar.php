<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Usuário deletado com sucesso!";
    } else {
        echo "Erro ao deletar: " . $conn->error;
    }

    $conn->close();
}
?>
