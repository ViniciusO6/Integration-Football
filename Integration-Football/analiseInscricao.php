<?php
// Imports dos estilos e definições do cabeçalho
$imports = [
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
];
$titulo = 'Detalhes da Inscrição';

// Inclui o cabeçalho com base no padrão da instituição
include_once('./templetes/headerInstituicao.php');

// Iniciar sessão e conexão com banco
include_once('./config.php');

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
        <form action="aceitarInscricao.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit" class="accept" name="action" value="aceitar">Aceitar</button>
        </form>
        <form action="rejeitarInscricao.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <button type="submit" class="reject" name="action" value="rejeitar">Rejeitar</button>
        </form>
    </div>
</div>

