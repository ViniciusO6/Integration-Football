<?php
session_start(); // Inicie a sessão

$imports = [
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];

$titulo = 'Página de Cadastro Final';
$pageCSS = ["Cadastro3.css"];

include_once('./templetes/index.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexão com o banco de dados
    $servername = "localhost"; // ou o endereço do seu servidor
    $username = "root"; // seu nome de usuário do banco de dados
    $password = ""; // sua senha do banco de dados
    $dbname = "integrationfootball"; // o nome do banco de dados

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Captura os dados da sessão
    $nome_inscrito = $_SESSION['nome_inscrito'] ?? '';
    $email_inscrito = $_SESSION['email_inscrito'] ?? '';
    $telefone_inscrito = $_SESSION['telefone_inscrito'] ?? '';
    
    $cpf = $_SESSION['cpf'] ?? '';
    $rg = $_SESSION['rg'] ?? '';
    $data_nascimento = $_SESSION['data_nascimento'] ?? '';
    $genero = $_SESSION['genero'] ?? '';
    $deficiencia = $_SESSION['deficiencia'] ?? '';
    $deficiencia_qual = $_SESSION['deficiencia_qual'] ?? '';

    $nome_responsavel = $_SESSION['nome_responsavel'] ?? '';
    $cpf_responsavel = $_SESSION['cpf_responsavel'] ?? '';
    $rg_responsavel = $_SESSION['rg_responsavel'] ?? '';
    $email_responsavel = $_SESSION['email_responsavel'] ?? '';
    $telefone_responsavel = $_SESSION['telefone_responsavel'] ?? '';

    // Prepara a instrução SQL para inserir os dados no banco
    $stmt = $conn->prepare("INSERT INTO inscricao (nome_inscrito, email_inscrito, telefone_inscrito, Cpf_inscrito, Rg_inscrito, data_nasc, genero_inscrito, deficiencia, nomeResponsavel, CpfResponsavel, RgReponsavel, emailResponsavel, telResponsavel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Erro ao preparar a declaração: " . $conn->error);
    }

    // VINCULA AS VARIÁVEIS À DECLARAÇÃO PREPARADA
    // Verifique se a quantidade de 's' corresponde ao número de parâmetros
    $stmt->bind_param("sssssssssssss", 
        $nome_inscrito, 
        $email_inscrito, 
        $telefone_inscrito, 
        $cpf, 
        $rg, 
        $data_nascimento, 
        $genero, 
        $deficiencia, 
        $nome_responsavel, 
        $cpf_responsavel, 
        $rg_responsavel, 
        $email_responsavel, 
        $telefone_responsavel
    );

    // Executa a instrução
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
        // Limpa os dados da sessão após a inserção
        session_destroy(); // Destroi a sessão
        header("Location: sucesso.php"); // Redireciona para uma página de sucesso
        exit; // Garante que o script seja encerrado após o redirecionamento
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a instrução e a conexão
    $stmt->close();
    $conn->close();
}
?>

<div class="container">
    <div class="card">
     
        <form action="cadastro3.php" method="POST"> <!-- Usar POST para confirmar o cadastro -->
            <div class="button-container">
                <button type="submit" id="finalizar">Finalizar Cadastro</button>
            </div>
        </form>
    </div>
</div>

<?php include_once('./templetes/footer.php'); ?>
