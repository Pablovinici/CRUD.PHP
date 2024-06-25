<?php
require '../config/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo "Usuário excluído com sucesso.";
} else {
    echo "Erro ao excluir usuário.";
}
?>
