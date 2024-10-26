<?php
session_start(); // Inicia a sessão
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Definições para o cabeçalho
$imports = [
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Página Escolha de Modalidade';
$pageCSS = ["cadastroModali.css"];
include_once('./templetes/index.php');

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "integrationfootball";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array de modalidades
$modalidades = [
    "POWER SOCCER" => ["imagem" => "Imagens/PowerSoccer.png", "classe" => "image-1"],
    "WALKING FOOTBALL" => ["imagem" => "Imagens/WalkingFootball.png", "classe" => "image-2"],
    "FUTEBOL DE 5" => ["imagem" => "Imagens/PowerSoccer.png", "classe" => "image-3"],
    "POWER SOCCER 2" => ["imagem" => "Imagens/WalkingFootball.png", "classe" => "image-4"]
];

// Verifica se a modalidade foi escolhida
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['escolha'])) {
    $_SESSION['modalidadeInscrito'] = $_POST['escolha'];
}

// Captura os dados da sessão
// Captura os dados da sessão com valores padrão
$nome_inscrito = $_SESSION['nome_inscrito'] ?? ''; // Continua vazio se não definido
$email_inscrito = $_SESSION['email_inscrito'] ?? ''; // Continua vazio se não definido
$telefone_inscrito = $_SESSION['telefone_inscrito'] ?? ''; // Continua vazio se não definido
$cpf_inscrito = $_SESSION['Cpf_inscrito'] ?? '00000000000'; // Atribui um valor padrão
$rg_inscrito = $_SESSION['RG_inscrito'] ?? '000000000'; // Atribui um valor padrão
$data_nasc = $_SESSION['data_nasc'] ?? ''; // Continua vazio se não definido
$genero_inscrito = $_SESSION['genero_inscrito'] ?? ''; // Continua vazio se não definido
$deficiencia = $_SESSION['deficiencia'] ?? ''; // Continua vazio se não definido
$nome_responsavel = $_SESSION['nomeResponsavel'] ?? 'Nome Padrão'; // Atribui um valor padrão
$cpf_responsavel = $_SESSION['CpfResponsavel'] ?? '00000000000'; // Atribui um valor padrão
$rg_responsavel = $_SESSION['RgReponsavel'] ?? '000000000'; // Atribui um valor padrão
$email_responsavel = $_SESSION['emailResponsavel'] ?? ''; // Continua vazio se não definido
$telefoneresponsavel = $_SESSION['telResponsavel'] ?? ''; // Continua vazio se não definido
$modalidadeInscrito = $_SESSION['modalidadeInscrito'] ?? ''; // Continua vazio se não definido
$unidade = $_SESSION['unidadeInscrito'] ?? ''; // Continua vazio se não definido


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proximo'])) {
    // Verifica se a modalidade foi escolhida
    if (empty($modalidadeInscrito)) {
        echo "Por favor, escolha uma modalidade antes de continuar.";
    } else {
        // Prepara a instrução SQL para inserir os dados no banco
        $stmt = $conn->prepare("INSERT INTO inscricao (nome_inscrito, email_inscrito, telefone_inscrito, Cpf_inscrito, RG_inscrito, data_nasc, genero_inscrito, deficiencia, nomeResponsavel, CpfResponsavel, RgReponsavel, emailResponsavel, telResponsavel, modalidadeInscrito, unidadeInscrito) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Erro ao preparar a declaração: " . $conn->error);
        }

        // Determina a string de tipos
        $params = [
            $nome_inscrito,
            $email_inscrito,
            $telefone_inscrito,
            $cpf_inscrito,
            $rg_inscrito,
            $data_nasc,
            $genero_inscrito,
            $deficiencia,
            $nome_responsavel,
            $cpf_responsavel,
            $rg_responsavel,
            $email_responsavel,
            $telefoneresponsavel,
            $modalidadeInscrito,
            $unidade
        ];
        $types = str_repeat('s', count($params)); // Cria uma string de tipos 's' para cada parâmetro

        // Verifica se o número de parâmetros e tipos está correto
        if (count($params) !== strlen($types)) {
            die('O número de parâmetros não corresponde ao número de tipos.');
        }

        // Chame bind_param com o número correto de variáveis
        $stmt->bind_param($types, ...$params);
        if ($stmt->execute()) {
            session_destroy(); // Destroi a sessão após a inserção
            header("Location: cadastroFinal.php"); // Redireciona para a página de sucesso
            exit;
        } else {
            echo "Erro: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Fecha a conexão
$conn->close();
?>
<div class="container">
    <div class="card">
        <h1 class="card-title">4. ESCOLHA A MODALIDADE</h1>
        <form id="modalidadeForm" method="POST">
            <div class="card-container">
                <?php foreach ($modalidades as $nome_modalidade => $dados): ?>
                <div class="mini-card">
                    <h3><?php echo htmlspecialchars($nome_modalidade); ?></h3>
                    <div class="image-container <?php echo htmlspecialchars($dados['classe']); ?>">
                        <img src="<?php echo htmlspecialchars($dados['imagem']); ?>" alt="Imagem de <?php echo htmlspecialchars($nome_modalidade); ?>" />
                    </div>
                    <button type="button" onclick="chooseModalidade('<?php echo htmlspecialchars($nome_modalidade); ?>')">Escolher</button>
                </div>
                <?php endforeach; ?>
            </div>
            <input type="hidden" id="modalidadeEscolhida" name="escolha" value="">
            <div class="button-container">
                <button type="submit" name="proximo" class="btn-proximo">Próximo</button>
            </div>
        </form>
    </div>
</div>
<script>
function chooseModalidade(modalidade) {
    // Atualiza o campo oculto com a modalidade escolhida
    document.getElementById("modalidadeEscolhida").value = modalidade;

    // Remover a classe 'selected' de todos os botões
    var buttons = document.querySelectorAll('.mini-card button');
    buttons.forEach(button => button.classList.remove('selected')); // Remove a seleção anterior

    // Adiciona a classe 'selected' ao botão clicado
    var selectedButton = event.target;
    selectedButton.classList.add('selected');
}
</script>



<input type="hidden" id="modalidadeEscolhida" name="modalidadeEscolhida" value="">
<?php include_once('./templetes/footer.php'); ?>
