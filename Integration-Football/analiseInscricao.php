<?php
// Imports dos estilos e definições do cabeçalho
$imports = [
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
];
$titulo = 'Visualizar Inscrições';

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

<div class="container">
    <h1>Detalhes da Inscrição</h1>
    <table>
        <tr><th>ID:</th><td><?= $row['id'] ?></td></tr>
        <tr><th>Nome:</th><td><?= $row['nome_inscrito'] ?></td></tr>
        <tr><th>Data de Nascimento:</th><td><?= $row['data_nasc'] ?></td></tr>
        <tr><th>CPF:</th><td><?= $row['Cpf_inscrito'] ?></td></tr>
        <tr><th>CPF do Responsável:</th><td><?= $row['CpfResponsavel'] ?></td></tr>
        <tr><th>RG:</th><td><?= $row['RG_inscrito'] ?></td></tr>
        <tr><th>RG do Responsável:</th><td><?= $row['RgReponsavel'] ?></td></tr>
        <tr><th>E-mail:</th><td><?= $row['email_inscrito'] ?></td></tr>
        <tr><th>E-mail do Responsável:</th><td><?= $row['emailResponsavel'] ?></td></tr>
        <tr><th>Telefone:</th><td><?= $row['telefone_inscrito'] ?></td></tr>
        <tr><th>Telefone do Responsável:</th><td><?= $row['telResponsavel'] ?></td></tr>
        <tr><th>Modalidade:</th><td><?= $row['modalidadeInscrito'] ?></td></tr>
        <tr><th>Unidade:</th><td><?= $row['unidadeInscrito'] ?></td></tr>
        <tr><th>Gênero:</th><td><?= $row['genero_inscrito'] ?></td></tr>
        <tr><th>Deficiência:</th><td><?= $row['deficiencia'] ?></td></tr>
    </table>
    
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

<?php include_once('./templetes/footer.php'); ?>
