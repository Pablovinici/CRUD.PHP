<!DOCTYPE html>
<html>
<head>
    <title>Listar Usuários</title>
</head>
<body>
    <h2>Lista de Usuários</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        require '../config/db.php';
        $stmt = $pdo->query("SELECT * FROM usuarios");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['nome_completo']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td><a href='../views/formulario_atualizar.php?id={$row['id']}'>Editar</a> | <a href='../actions/deletar.php?id={$row['id']}'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
