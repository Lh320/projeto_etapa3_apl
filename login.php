<?php
session_start();
include 'conexao.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['user_name']; 
    $senha = $_POST['password'];   

    
    $sql = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
    $sql->bind_param("ss", $usuario, $senha);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
       
        $_SESSION['usuario'] = $usuario;

       
       

        echo "<script>alert('logado');</script>";

        header("Location: landing.php");
        exit();
        
    } else {
        echo "Usuário ou senha incorretos.";
    }
}
?>





<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Acesso Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Acesso Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container" style="max-width: 400px; margin-top: 100px;">
    <h2 class="text-center">Login</h2>

   
    <form action="login_action.php" method="POST">
        <div class="mb-3">
            <label for="user_name" class="form-label">Nome de Usuário</label>
            <input type="text" class="form-control" id="user_name" name="user_name" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="" class="btn btn-primary w-100">enviar</button>
    </form>

    
    <div class="text-center mt-3">
        <a href="form.php" class="btn btn-outline-secondary w-100 mb-2">Cadastrar-se</a>
        <a href="landing.php" class="btn btn-outline-success w-100">Ir para o site</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
