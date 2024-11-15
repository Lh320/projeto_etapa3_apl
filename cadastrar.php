<?php
session_start();
include 'conexao.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $rg = $_POST['rg'];
    $senha = $_POST['senha'];


    if ($tipoDocumento == "cpf" && isset($_POST['cpf'])) {
        $cpf = $_POST['cpf'];
        $cnpj = null;
    } elseif ($tipoDocumento == "cnpj" && isset($_POST['cnpj'])) {
        $cnpj = $_POST['cnpj'];
        $cpf = null;
    } else {
        echo "Por favor, preencha o CPF ou CNPJ corretamente.";
        exit();
    }


    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

   
    $sql_check = "SELECT * FROM usuarios WHERE cpf = ? OR cnpj = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param('ss', $cpf, $cnpj);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo "Este CPF ou CNPJ já está cadastrado.";
    } else {
   
        $sql = "INSERT INTO usuarios (nome, telefone, tipo_documento, cpf, cnpj, rg, senha) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssss', $nome, $telefone, $tipoDocumento, $cpf, $cnpj, $rg, $senha_hash);

        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
            header("Location: login.php"); 
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conn->close();
}
?>
