<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : null;

    if ($senha) {
        $stmt = $pdo->prepare("UPDATE usuarios SET nome_completo = :nome_completo, email = :email, senha = :senha WHERE id = :id");
        $stmt->bindParam(':senha', $senha);
    } else {
        $stmt = $pdo->prepare("UPDATE usuarios SET nome_completo = :nome_completo, email = :email WHERE id = :id");
    }
    
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome_completo', $nome_completo);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo "Usuário atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar usuário.";
    }
}
?>
