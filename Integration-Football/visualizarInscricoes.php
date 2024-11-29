<?php
session_start();

// Imports dos estilos e definições do cabeçalho
$imports = [
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
];
$titulo = 'Visualizar Inscrições';

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
// Inclui o cabeçalho com base no padrão da instituição
include_once('./templetes/headerInstituicao.php');

// Inicia a sessão e verifica autenticação do usuário
if (!isset($_SESSION['usuario']) || strpos($_SESSION['usuario'], '@football') === false) {
    echo "<script>alert('Acesso não autorizado!');</script>";
    echo "<script>location.href='Login.php';</script>";
    exit;
}

// Inclui a conexão com o banco de dados


// Consulta para recuperar as inscrições com status 'pendente' (não 'inativa' ou 'aceita')
$sql = "SELECT id, nome_inscrito, cpf_inscrito, email_inscrito, modalidadeInscrito, unidadeInscrito, telefone_inscrito, genero_inscrito, deficiencia 
        FROM inscricao 
        WHERE status = 'pendente' 
        ORDER BY id";

// Executa a consulta
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    echo "<script>alert('Erro ao buscar as inscrições.');</script>";
    exit;
}

?>

<link rel="stylesheet" href="css/visualizarInscricoes.css">

<div class="container">
    <h1>Inscrições Pendentes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Modalidade</th>
                <th>Unidade</th>
                <th>Telefone</th>
                <th>Gênero</th>
                <th>Deficiência</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                    echo "<tr onclick=\"location.href='analiseInscricao.php?id={$id}'\" style='cursor: pointer;'>
                            <td>{$row['id']}</td>
                            <td>{$row['nome_inscrito']}</td>
                            <td>{$row['cpf_inscrito']}</td>
                            <td>{$row['email_inscrito']}</td>
                            <td>{$row['modalidadeInscrito']}</td>
                            <td>{$row['unidadeInscrito']}</td>
                            <td>{$row['telefone_inscrito']}</td>
                            <td>{$row['genero_inscrito']}</td>
                            <td>{$row['deficiencia']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>Nenhuma inscrição pendente encontrada.</td></tr>";
            }
            ?>
</tbody>

        

    </table>
</div>

<?php include_once('./templetes/footer.php'); ?>
