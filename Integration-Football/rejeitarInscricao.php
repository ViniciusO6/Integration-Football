<?php
// Iniciar sessão e conexão com banco
session_start();
include_once('./config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe o ID da inscrição
    $id = intval($_POST['id']);
    
    // Atualiza o status da inscrição para 'inativa'
    $sqlUpdate = "UPDATE inscricao SET status = 'inativa' WHERE id = $id";
    
    if ($conn->query($sqlUpdate)) {
        // Redireciona para a página de visualização de inscrições
        echo "<script>alert('Inscrição rejeitada e inativada!'); location.href='visualizarInscricoes.php';</script>";
    } else {
        echo "Erro ao rejeitar inscrição: " . $conn->error;
    }
}
?>

<link rel="stylesheet" href="css/rejeitarInscricao.css">
