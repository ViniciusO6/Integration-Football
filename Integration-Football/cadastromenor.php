<?php 
session_start(); // Inicia sessão no início do arquivo

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
    $Cpf_inscrito = $_POST['Cpf_inscrito'] ?? ''; 
    $RG_inscrito = $_POST['RG_inscrito'] ?? ''; 
    $data_nasc = $_POST['data_nasc'] ?? ''; 
    $genero_inscrito = $_POST['genero_inscrito'] ?? ''; 
    $deficiencia = $_POST['deficiência'] ?? ''; 
    $deficiencia_qual = $_POST['deficiência_qual'] ?? ''; 
    $nomeResponsavel = $_POST['nome_responsavel'] ?? ''; 
    $CpfResponsavel = $_POST['cpf_responsavel'] ?? ''; 
    $RgReponsavel = $_POST['rg_responsavel'] ?? ''; 
    $emailResponsavel = $_POST['email_responsavel'] ?? ''; 
    $telResponsavel = $_POST['telefone_responsavel'] ?? ''; 

    // Armazena os dados na sessão
    $_SESSION['Cpf_inscrito'] = $Cpf_inscrito; 
    $_SESSION['RG_inscrito'] = $RG_inscrito; 
    $_SESSION['data_nasc'] = $data_nasc; 
    $_SESSION['genero_inscrito'] = $genero_inscrito; 
    $_SESSION['deficiencia'] = $deficiencia; 
    $_SESSION['deficiencia_qual'] = $deficiencia_qual; 
    $_SESSION['nomeResponsavel'] = $nomeResponsavel; 
    $_SESSION['CpfResponsavel'] = $CpfResponsavel; 
    $_SESSION['RgReponsavel'] = $RgReponsavel; 
    $_SESSION['emailResponsavel'] = $emailResponsavel; 
    $_SESSION['telResponsavel'] = $telResponsavel; 

    // Redireciona para a página cadastroUnidade.php 
    header("Location: cadastroUnidade.php"); 
    exit; // Garantir que o script seja encerrado após o redirecionamento 
} 
?> 

<div class="container"> 
    <div class="card"> 
        <h1 class="card-title">2. Dados pessoais</h1> 
        <form action="cadastromenor.php" method="POST"> 
            <div class="input-container"> 
                <div class="left-section"> 
                    <div class="input"> 
                        <label for="cpf">CPF:<span id="point">*</span></label> 
                        <input type="text" id="cpf" name="Cpf_inscrito" required /> 
                    </div> 
                    <div class="input"> 
                        <label for="rg">RG: <span id="point">*</span></label> 
                        <input type="text" id="rg" name="RG_inscrito" required /> 
                    </div> 
                    <div class="input"> 
                        <label for="data_nascimento">Data de Nascimento: <span id="point">*</span></label> 
                        <input type="date" id="data_nascimento" name="data_nasc" required /> 
                    </div> 
                    <div class="input"> 
                        <label for="genero">Gênero: <span id="point">*</span></label> 
                        <select id="genero" name="genero_inscrito" required> 
                            <option value="" disabled selected>Selecione seu gênero</option> 
                            <option value="masculino">Masculino</option> 
                            <option value="feminino">Feminino</option> 
                            <option value="outro">Outro</option> 
                        </select> 
                    </div> 
                    <div class="input"> 
                        <label for="deficiência">Possui deficiência? Se sim, qual? <span id="point">*</span></label> 
                        <select id="deficiência" name="deficiência" required> 
                            <option value="" disabled selected>Selecione</option> 
                            <option value="sim">Sim</option> 
                            <option value="nao">Não</option> 
                        </select> 
                        <input type="text" id="deficiencia_qual" name="deficiência_qual" placeholder="Especifique a deficiência" style="display: none;" /> 
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
                        <label for="email_responsavel">E-mail do Responsável: <span id="point">*</span></label> 
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
    const deficienciaSelect = document.getElementById('deficiência'); 
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
