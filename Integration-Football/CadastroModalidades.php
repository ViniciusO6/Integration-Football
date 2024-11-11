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
$pageCSS = ["cadastroModalidades.css"];
include_once('./templetes/menu.php');

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
    "POWER SOCCER" => ["imagem" => "Imagens/Cadastro/PowerSoccer.png", "classe" => "image-1"],
    "WALKING FOOTBALL" => ["imagem" => "Imagens/Cadastro/person.png", "classe" => "image-2"],
    "FUTEBOL DE 5" => ["imagem" => "Imagens/Cadastro/cego.png", "classe" => "image-3"],
    "MULHERES NO ESPORTE" => ["imagem" => "Imagens/Cadastro/girl.png", "classe" => "image-4"]
];

// Verifica se a modalidade foi escolhida
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['escolha'])) {
    $_SESSION['modalidadeInscrito'] = $_POST['escolha'];
}


$nome_inscrito = $_SESSION['nome_inscrito'] ?? ''; 
$email_inscrito = $_SESSION['email_inscrito'] ?? ''; 
$telefone_inscrito = $_SESSION['telefone_inscrito'] ?? '';
$Cpf_inscrito = $_SESSION['Cpf_inscrito'] ?? '0'; 
$RG_inscrito = $_SESSION['RG_inscrito'] ?? '0';
$data_nasc = $_SESSION['data_nasc'] ?? ''; 
$genero_inscrito = $_SESSION['genero_inscrito'] ?? ''; 
$deficiencia_qual = $_SESSION['deficiencia_qual'] ?? '0'; 
$nome_responsavel = $_SESSION['nomeResponsavel'] ?? '0'; 
$cpf_responsavel = $_SESSION['CpfResponsavel'] ?? '0'; 
$rg_responsavel = $_SESSION['RgReponsavel'] ?? '0'; 
$email_responsavel = $_SESSION['emailResponsavel'] ?? '0'; // Continua vazio se não definido
$telefoneresponsavel = $_SESSION['telResponsavel'] ?? '0'; // Continua vazio se não definido
$modalidadeInscrito = $_SESSION['modalidadeInscrito'] ?? ''; // Continua vazio se não definido
$unidade = $_SESSION['unidadeInscrito'] ?? ''; // Continua vazio se não definido


var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proximo'])) {
    // Verifica se a modalidade foi escolhida
    if (empty($modalidadeInscrito)) {
        echo "Por favor, escolha uma modalidade antes de continuar.";
    } else {
        // Captura a senha e a hasheia
        $senha_inscrito = $_POST['senha_inscrito'] ?? ''; // Captura a senha do formulário
        $senha_hash = password_hash($senha_inscrito, PASSWORD_DEFAULT); // Hasheia a senha

        // Prepara a instrução SQL para inserir os dados no banco
        $stmt = $conn->prepare("INSERT INTO inscricao (nome_inscrito, telefone_inscrito, email_inscrito, senha_inscrito, Cpf_inscrito, RG_inscrito, data_nasc, genero_inscrito, deficiencia, nomeResponsavel, CpfResponsavel, RgReponsavel, emailResponsavel, telResponsavel, modalidadeInscrito, unidadeInscrito) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Erro ao preparar a declaração: " . $conn->error);
        }

        // Determina a string de tipos
        $params = [
            $nome_inscrito,
            $telefone_inscrito,
            $email_inscrito,
            $senha_hash, // Insere o hash da senha
            $Cpf_inscrito,
            $RG_inscrito,
            $data_nasc,
            $genero_inscrito,
            $deficiencia_qual,
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

<?php include_once('./templetes/footer.php'); ?>
