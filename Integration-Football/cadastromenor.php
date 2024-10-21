<?php
session_start(); // Inicie a sessão no início do arquivo

$imports = [
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];

$titulo = 'Página de Cadastromenor';
$pageCSS = ["Cadastromenor.css"];

include_once('./templetes/index.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário e armazena na sessão
    $cpf = $_POST['cpf'] ?? '';
    $rg = $_POST['rg'] ?? '';
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $deficiencia = $_POST['deficiencia'] ?? '';
    $deficiencia_qual = $_POST['deficiencia_qual'] ?? '';
    $nome_responsavel = $_POST['nome_responsavel'] ?? '';
    $cpf_responsavel = $_POST['cpf_responsavel'] ?? '';
    $rg_responsavel = $_POST['rg_responsavel'] ?? '';
    $email_responsavel = $_POST['email_responsavel'] ?? '';
    $telefone_responsavel = $_POST['telefone_responsavel'] ?? '';

    // Armazene os dados na sessão
    $_SESSION['cpf'] = $cpf;
    $_SESSION['rg'] = $rg;
    $_SESSION['data_nascimento'] = $data_nascimento;
    $_SESSION['genero'] = $genero;
    $_SESSION['deficiencia'] = $deficiencia;
    $_SESSION['deficiencia_qual'] = $deficiencia_qual;
    $_SESSION['nome_responsavel'] = $nome_responsavel;
    $_SESSION['cpf_responsavel'] = $cpf_responsavel;
    $_SESSION['rg_responsavel'] = $rg_responsavel;
    $_SESSION['email_responsavel'] = $email_responsavel;
    $_SESSION['telefone_responsavel'] = $telefone_responsavel;

    // Redireciona para a página cadastro3.php
    header("Location: cadastro3.php");
    exit; // Garante que o script seja encerrado após o redirecionamento
}
?>

<div class="container">
    <div class="card">
        <h1 class="card-title">2. Dados pessoais</h1>
        <form action="cadastromenor.php" method="POST"> <!-- Usar POST -->
            <div class="input-container">
                <div class="left-section">
                    <div class="input">
                        <label for="cpf">CPF: <span id="point">*</span></label>
                        <input type="text" id="cpf" name="cpf" required />
                    </div>
                    <div class="input">
                        <label for="rg">RG: <span id="point">*</span></label>
                        <input type="text" id="rg" name="rg" required />
                    </div>
                    <div class="input">
                        <label for="data_nascimento">Data de Nascimento: <span id="point">*</span></label>
                        <input type="date" id="data_nascimento" name="data_nascimento" required />
                    </div>
                    <div class="input">
                        <label for="genero">Gênero: <span id="point">*</span></label>
                        <select id="genero" name="genero" required>
                            <option value="" disabled selected>Selecione seu gênero</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    <div class="input">
                        <label for="deficiencia">Possui deficiência? Se sim, qual? <span id="point">*</span></label>
                        <select id="deficiencia" name="deficiencia" required>
                            <option value="" disabled selected>Selecione</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                        <input type="text" id="deficiencia_qual" name="deficiencia_qual" placeholder="Especifique a deficiência" style="display: none;" />
                    </div>
                </div>
                
                <div class="image-container">
                    <img src="Imagens/cadastroMaior.png" alt="Imagem de Cadastro" class="input-image" />
                </div>
                
                <div class="right-section">
                    <div class="input1">
                        <label for="nome_responsavel">Nome do Responsável: <span id="point">*</span></label>
                        <input type="text" id="nome_responsavel" name="nome_responsavel" required />
                    </div>
                    <div class="input1">
                        <label for="cpf_responsavel">CPF do Responsável: <span id="point">*</span></label>
                        <input type="text" id="cpf_responsavel" name="cpf_responsavel" required />
                    </div>
                    <div class="input1">
                        <label for="rg_responsavel">RG do Responsável: <span id="point">*</span></label>
                        <input type="text" id="rg_responsavel" name="rg_responsavel" required />
                    </div>
                    <div class="input1">
                        <label for="email_responsavel">Email do Responsável: <span id="point">*</span></label>
                        <input type="email" id="email_responsavel" name="email_responsavel" required />
                    </div>
                    <div class="input1">
                        <label for="telefone_responsavel">Telefone do Responsável: <span id="point">*</span></label>
                        <input type="tel" id="telefone_responsavel" name="telefone_responsavel" required />
                    </div>
                </div>
            </div>

            <div class="button-container">
                <button type="submit" id="proximo">Próximo</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deficienciaSelect = document.getElementById('deficiencia');
        const deficienciaQualInput = document.getElementById('deficiencia_qual');

        deficienciaSelect.addEventListener('change', function () {
            deficienciaQualInput.style.display = this.value === 'sim' ? 'block' : 'none';
            if (this.value !== 'sim') {
                deficienciaQualInput.value = ''; // Limpa o campo se "Não" for selecionado
            }
        });
    });
</script>

<?php include_once('./templetes/footer.php'); ?>
