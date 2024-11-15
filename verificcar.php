<?php
session_start();
include 'conexao.php';

if (isset($_SESSION['usuario_id'])) {
    echo "Olá, " . $_SESSION['usuario_nome'] . "! <a href='logout.php'>Sair</a>";
} else {
    echo "Você não está logado. <a href='form.php'>Login</a> | <a href='form.php'>Cadastro</a>";
}
?>
