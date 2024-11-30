<?php
session_start(); // Inicie a sessão
echo $_SESSION['senha_inscrito'];
// Verifica se a unidade foi escolhida via AJAX
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome_unidade'])) {
    $_SESSION['unidadeInscrito'] = $_POST['nome_unidade']; // Armazena a unidade na sessão
    exit(); // Finaliza a execução do script sem retornar mensagem
}
$imports =[
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  ];

$titulo = 'Seleção de Instituição';
$pageCSS = ["cadastroUnidades.css"];

include_once('./templetes/menu.php');

// Conexão com o banco de dados
$servername = "localhost"; // Ajuste conforme necessário
$username = "root";
$password = '';
$dbname = "integrationfootball";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mostrarCard = false;
$unidade = [];
$erroMensagem = ''; // Inicializa a variável de erro
$mapUrl = ''; // Inicializa a URL do mapa

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Verifica se o botão "Buscar" foi clicado
    if (isset($_POST['Buscar'])) {
        if (empty($_POST['pesquisa'])) {
            $erroMensagem = 'Preencha este campo'; // Define a mensagem de erro
        } else {
            $pesquisa = $conn->real_escape_string($_POST['pesquisa']); // Evitar injeção de SQL

            // Consulta ao banco de dados
            $sql = "SELECT nome_unidade, endereco, telefone, email, numero FROM unidade WHERE cep = '$pesquisa'";
            $result = $conn->query($sql);
            
            if ($result && $result->num_rows > 0) {
                $unidade = $result->fetch_assoc();
                $mostrarCard = true;

                // Definindo a URL do mapa com base no CEP
                switch ($pesquisa) {
                    case '2013040':
                        $mapUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.838505857725!2d-46.63632912454807!3d-23.502325659426255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef7d2f2049b4d%3A0xb86e03f1dcda2b94!2sR.%20Emb.%20Jo%C3%A3o%20Neves%20da%20Fontoura%20-%20Santana%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2002013-040!5e0!3m2!1spt-BR!2sbr!4v1729696988180!5m2!1spt-BR!2sbr";
                        break;
                    case '4104021':
                        $mapUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d914.1906301032527!2d-46.6400505339505!3d-23.576971162166057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce599ae3fa0d51%3A0x63d03abb22ac44f5!2sR.%20Apeninos%2C%201063%20-%20Vila%20Mariana%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004104-021!5e0!3m2!1spt-BR!2sbr!4v1729697246404!5m2!1spt-BR!2sbr";
                        break;

                        case '8295001':
                            $mapUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.735533298416!2d-46.46043862454678!3d-23.542012660881873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce66bf869da9d5%3A0x4b2ab095d41e700b!2sAv.%20Itaquera%2C%207986%20-%20Vila%20Carmosina%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2008295-001!5e0!3m2!1spt-BR!2sbr!4v1730211559937!5m2!1spt-BR!2sbr" ;
                            break;


                            case '8790610':
                                $mapUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.131023496558!2d-46.166621199999966!3d-23.527789450000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cdd9adf9b36cb1%3A0xb1e83032fa8eba63!2sR.%20Mariana%20Najar%2C%20601%20-%20Vila%20Oliveira%2C%20Mogi%20das%20Cruzes%20-%20SP%2C%2008790-610!5e0!3m2!1spt-BR!2sbr!4v1730316573253!5m2!1spt-BR!2sbr";
                                break;

                    default:
                        $mapUrl = ""; // URL padrão ou deixe vazio
                }
            } else {
                $erroMensagem = 'Nenhuma unidade encontrada para o CEP informado.';
            }
        }
    }

    // Verifica se o botão "Próximo" foi clicado
    if (isset($_POST['proximo'])) {
        // Insere no banco de dados ao clicar no botão "Próximo"
        if (isset($_SESSION['unidadeInscrito'])) {
            $nomeUnidade = $_SESSION['unidadeInscrito'];
            $_SESSION['senha_inscrito'] = $_POST['senha_inscrito'] ?? '';
            $sqlInscricao = "INSERT INTO inscricao (unidadeInscrito) VALUES ('$nomeUnidade')";
            
            if ($conn->query($sqlInscricao) === TRUE) {
                // Sucesso, redirecionar
                header('Location: cadastroModalidades.php'); // Altere para sua página de sucesso
                exit();
            } else {
                $erroMensagem = 'Erro ao inscrever unidade: ' . $conn->error;
            }
        }
    }
}

$conn->close(); // Fechar a conexão
?>

<div class="container">
    <div class="card">
        <h1 class="card-title">3. ESCOLHA A UNIDADE</h1>
        <form action="" method="POST" id="unidadeForm">
            <div class="image-container">
                <img src="Imagens/Cadastro/cadastrounidade.png" alt="Imagem de Cadastro" class="input-image" />
            </div>
            <div class="input-container">
                <div class="input">
                    <label for="pesquisa">Digite o seu CEP para encontrar a unidade mais próxima: <span id="point"></span></label>
                    <input type="text" id="pesquisa" name="pesquisa" class="input-cep" required />
                </div>
            </div>
            <div class="button-container">
                <button type="submit" name="Buscar" id="Buscar">Buscar</button>
            </div>

            <?php if ($erroMensagem): ?>
                <div class="error-message" style="color: red; text-align: center; margin-top: 10px;">
                    <?php echo $erroMensagem; ?>
                </div>
            <?php endif; ?>

            <?php if ($mostrarCard): ?> 
                <div class="mini-card">
                    <h3><?php echo htmlspecialchars($unidade['nome_unidade'] ??  'Nome não disponível');  ?> <br></h3>
                    <h4>
                        Endereço: <?php echo htmlspecialchars($unidade['endereco'] ?? 'Endereço não disponível'); ?>
                     , <?php echo htmlspecialchars($unidade['numero'] ?? 'Telefone não disponível'); ?><br><br>
                        Telefone: <?php echo htmlspecialchars($unidade['telefone'] ?? 'Telefone não disponível'); ?><br><br>
                        E-mail: <?php echo htmlspecialchars($unidade['email'] ?? 'E-mail não disponível'); ?>
                    </h4>

                    <input type="hidden" name="nome_unidade" value="<?php echo htmlspecialchars($unidade['nome_unidade'] ?? ''); ?>">
                    <button type="button" id="escolher" onclick="escolherUnidade('<?php echo htmlspecialchars($unidade['nome_unidade'] ?? ''); ?>')">Escolher</button>
                </div>

                <?php if ($mapUrl): ?>
                    <div class="mapBox">
                        <iframe 
                            src="<?php echo $mapUrl; ?>" 
                            width="600" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                <?php endif; ?>
                
                <div class="button-container">
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>

<script>
function escolherUnidade(nomeUnidade) {
    // Envia uma requisição AJAX para armazenar a unidade na sessão
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Unidade escolhida com sucesso, você pode adicionar lógica se necessário
            console.log('Unidade escolhida: ' + nomeUnidade);
            // Opcional: redirecionar após escolher a unidade
            window.location.href = 'cadastroModalidades.php';
        }
    };
    xhr.send('nome_unidade=' + encodeURIComponent(nomeUnidade));
}
</script>


<?php include_once('./templetes/footer.php'); ?>
