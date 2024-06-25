<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
</head>
<body>
    <h2>Editar Usuário</h2>
    <?php
    require '../config/db.php';
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <form action="../actions/atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        Nome Completo: <input type="text" name="nome_completo" value="<?php echo $usuario['nome_completo']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>
        Senha: <input type="password" name="senha"><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
