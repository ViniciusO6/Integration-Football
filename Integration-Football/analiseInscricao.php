<?php
session_start();

// Imports dos estilos e definições do cabeçalho
$imports = [
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
];
$titulo = 'Detalhes da Inscrição';

// Inclui o cabeçalho com base no padrão da instituição


// Iniciar sessão e conexão com banco
include_once('./config.php');
if (!isset($_SESSION['id'])) {
    echo "Você precisa estar logado para acessar esta página.";
    exit;
}
// Recupera o ID da instituição a partir da sessão
$id_instituicao = $_SESSION['id'];

// Consulta SQL para pegar as informações da tabela instituicao
$sql = "SELECT * FROM instituicao WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_instituicao); // Bind do parâmetro do tipo inteiro
$stmt->execute();
$result = $stmt->get_result();

// Verificando se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Pega os dados da instituição
    $instituicao = $result->fetch_assoc();
} else {
    // Se não encontrar nenhum resultado
    echo "Instituição não encontrada!";
    exit;
}



include_once('./templetes/headerInstituicao.php');
// Verificar se o ID foi passado via GET
if (!isset($_GET['id'])) {
    echo "ID inválido.";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM inscricao WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "Inscrição não encontrada.";
    exit;
}

$row = $result->fetch_assoc();
?>

<link rel="stylesheet" href="css/analiseInscricao.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container">
    <h1>DETALHES DA INSCRIÇÃO</h1>
    <form>
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" id="id" value="<?= $row['id'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" value="<?= $row['nome_inscrito'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="data_nasc">Data de Nascimento:</label>
            <input type="text" id="data_nasc" value="<?= $row['data_nasc'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" value="<?= $row['Cpf_inscrito'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="cpf_responsavel">CPF do Responsável:</label>
            <input type="text" id="cpf_responsavel" value="<?= $row['CpfResponsavel'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="rg">RG:</label>
            <input type="text" id="rg" value="<?= $row['RG_inscrito'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" value="<?= $row['email_inscrito'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="modalidade">Modalidade:</label>
            <input type="text" id="modalidade" value="<?= $row['modalidadeInscrito'] ?>" readonly>
        </div>
        <!-- Campo de deficiência ajustado -->
        <div class="form-group span-two">
            <label for="deficiencia">Deficiência:</label>
            <textarea id="deficiencia" readonly><?= $row['deficiencia'] ?></textarea>
        </div>
    </form>
    <div class="actions">
        <form id="acceptForm" action="aceitarInscricao.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="senha" value="<?= $row['senha_inscrito'] ?>">
            <button type="submit" class="accept" name="action" value="aceitar">Aceitar</button>
        </form>
        <!-- O form de rejeição agora chama o SweetAlert -->
        <form id="rejectForm" action="rejeitarInscricao.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="button" class="reject" id="rejectBtn">Rejeitar</button>
        </form>
    </div>
</div>

<script>
document.getElementById('rejectBtn').addEventListener('click', function(event) {
    event.preventDefault(); // Evita o envio imediato do formulário
    
    // Exibe o SweetAlert com fonte Barlow Condensed e ícone amarelo
    Swal.fire({
        title: 'Tem certeza?',
        text: "Você não poderá reverter essa ação!",
        icon: 'warning',
        iconColor: '#FFC107', // Cor amarela para o ícone
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sim, rejeitar!',
        cancelButtonText: 'Cancelar',
        customClass: {
            popup: 'swal-popup' // Classe customizada para aplicar o estilo
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Se o usuário confirmar, submete o formulário de rejeição
            document.getElementById('rejectForm').submit();
        }
    });
});
</script>

<!-- Estilos customizados para o SweetAlert -->
<style>
/* Aplica a fonte Barlow Condensed no SweetAlert */
.swal-popup, .swal-popup button {
    font-family: 'Barlow Condensed', sans-serif !important;
}
</style>
