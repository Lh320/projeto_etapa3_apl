<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #2a3d66;
            font-size: 2rem;
            font-weight: 600;
            text-align: center;
            margin: 20px 0;
        }


        .table {
            width: 100%;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #0056b3;
        }

        .table th,
        .table td {
            text-align: center;
            padding: 12px;
            font-size: 14px;
            word-wrap: break-word;
            vertical-align: middle;
        }

        .table th {
            color: #fff;
            text-transform: uppercase;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f1f9ff;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #e8f0fe;
        }

        .table-hover tbody tr:hover {
            background-color: #cce0ff;
        }


        .btn-outline-primary {
            border: 1px solid #0056b3;
            color: #0056b3;
            font-weight: 600;
            padding: 5px 10px;
        }

        .btn-outline-primary:hover {
            background-color: #0056b3;
            color: white;
        }

        .btn-outline-danger {
            border: 1px solid #dc3545;
            color: #dc3545;
            font-weight: 600;
            padding: 5px 10px;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }


        @media (max-width: 768px) {
            .table th, .table td {
                font-size: 12px;
                padding: 10px;
            }
            h2 {
                font-size: 1.5rem;
            }
        }
    </style>

</head>
<body>

    <?php
    include 'conexao.php';

    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);

    echo "<h2>Lista de Usuários</h2>";
    echo "<table class='table table-striped table-bordered table-hover'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Tipo de Documento</th>
            <th>CPF</th>
            <th>CNPJ</th>
            <th>RG</th>
            <th>Senha</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nome']}</td>
        <td>{$row['telefone']}</td>
        <td>{$row['tipo_documento']}</td>
        <td>{$row['cpf']}</td>
        <td>{$row['cnpj']}</td>
        <td>{$row['rg']}</td>
        <td>*******</td> <!-- Senha oculta para segurança -->
        <td>
            <a href='editar.php?id={$row['id']}' class='btn btn-outline-primary btn-sm'>Editar</a> |
            <a href='deletar.php?id={$row['id']}' class='btn btn-outline-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Deletar</a>
        </td>
        </tr>";
    }

    echo "</tbody></table>";

    $conn->close();
    ?>

</body>
</html>
