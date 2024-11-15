<?php
include 'conexao.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $tipoDocumento = $_POST['tipoDocumento'];
    $cpf = $_POST['cpf'];
    $cnpj = $_POST['cnpj'];
    $rg = $_POST['rg'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];

 
    if ($senha != $confirmarSenha) {
        echo "<script>alert('As senhas não coincidem!');</script>";
    } else {
     
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

       
        $sqlUpdate = "UPDATE usuarios SET nome = '$nome', telefone = '$telefone', tipo_documento = '$tipoDocumento', cpf = '$cpf', cnpj = '$cnpj', rg = '$rg', senha = '$senhaCriptografada' WHERE id = $id";
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href='listar.php';</script>";
        } else {
            echo "Erro ao atualizar: " . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        h2 {
            color: #2a3d66;
            font-size: 2rem;
            font-weight: 600;
            text-align: center;
            margin: 20px 0;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        .btn-primary {
            background-color: #0056b3;
            border: none;
        }

        .btn-primary:hover {
            background-color: #003366;
        }

        .form-select, .form-control {
            margin-bottom: 15px;
        }

        .d-none {
            display: none;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Editar Usuário</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                <select class="form-select" id="tipoDocumento" name="tipoDocumento" onchange="pessoa(this.value)" required>
                    <option value="cpf" <?php if ($row['tipo_documento'] == 'cpf') echo 'selected'; ?>>CPF</option>
                    <option value="cnpj" <?php if ($row['tipo_documento'] == 'cnpj') echo 'selected'; ?>>CNPJ</option>
                </select>
            </div>

            <div class="mb-3" id="campoCPF">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $row['cpf']; ?>" <?php echo ($row['tipo_documento'] == 'cpf' ? '' : 'disabled'); ?>>
            </div>

            <div class="mb-3" id="campoCNPJ">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $row['cnpj']; ?>" <?php echo ($row['tipo_documento'] == 'cnpj' ? '' : 'disabled'); ?>>
            </div>

            <div class="mb-3">
                <label for="rg" class="form-label">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" value="<?php echo $row['rg']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a nova senha">
            </div>

            <div class="mb-3">
                <label for="confirmarSenha" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="confirmarSenha" name="confirmarSenha" placeholder="Confirme a senha">
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
       
        document.getElementById('tipoDocumento').addEventListener('change', function() {
            if (this.value == 'cpf') {
                document.getElementById('campoCPF').classList.remove('d-none');
                document.getElementById('campoCNPJ').classList.add('d-none');
            } else {
                document.getElementById('campoCNPJ').classList.remove('d-none');
                document.getElementById('campoCPF').classList.add('d-none');
            }
        });
    </script>

</body>
</html>

<?php
$conn->close();
?>
