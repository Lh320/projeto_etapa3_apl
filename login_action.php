<?php
session_start();
include 'conexao.php'; 


if (isset($_POST['user_name']) && isset($_POST['password'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password']; 


    $sql = "SELECT * FROM usuarios WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $user_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['senha'])) {

            $_SESSION['user_name'] = $row['nome'];
            $_SESSION['user_id'] = $row['id'];


            header('Location: landingpage.php');
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
} else {
    echo "Por favor, preencha todos os campos.";
}

$conn->close();
?>
