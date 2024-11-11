<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
$imports = [
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
];

$titulo = 'Página de Cadastro'; 
$pageCSS = ["cadastroInfantil.css"]; 
include_once('./templetes/menu.php'); 

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aqui, a validação e armazenamento do PHP foi removido, já que a validação é feita no JS
    $_SESSION['Cpf_inscrito'] = $_POST['Cpf_inscrito'] ?? ''; 
    $_SESSION['RG_inscrito'] = $_POST['RG_inscrito'] ?? ''; 
    $_SESSION['data_nasc'] = $_POST['data_nasc'] ?? ''; 
    $_SESSION['genero_inscrito'] = $_POST['genero_inscrito'] ?? ''; 
    $_SESSION['deficiencia'] = $_POST['deficiência'] ?? ''; 
    $_SESSION['deficiencia_qual'] = $_POST['deficiência_qual'] ?? ''; 
    $_SESSION['nomeResponsavel'] = $_POST['nome_responsavel'] ?? ''; 
    $_SESSION['CpfResponsavel'] = $_POST['cpf_responsavel'] ?? ''; 
    $_SESSION['RgReponsavel'] = $_POST['rg_responsavel'] ?? ''; 
    $_SESSION['emailResponsavel'] = $_POST['email_responsavel'] ?? ''; 
    $_SESSION['telResponsavel'] = $_POST['telefone_responsavel'] ?? '';

    // Redireciona para a próxima página
    header("Location: cadastroUnidades.php");
    exit();
}
?>

<div class="container"> 
    <div class="card"> 
        <h1 class="card-title">2. DADOS PESSOAIS</h1> 

        <div class="image-container"> 
            <img src="Imagens/Cadastro/cadastroMaior.png" alt="Imagem de Cadastro" class="input-image" /> 
        </div>

        <form action="CadastroInfantil.php" method="POST" id="cadastroForm"> 
            <div class="input-container"> 
                <div class="left-section"> 
                    <div class="input"> 
                        <label for="cpf">CPF do Inscrito:<span id="point">*</span></label> 
                        <input type="text" id="cpf" name="Cpf_inscrito" required /> 
                        <small id="cpfError" style="color: red; display: none;">CPF inválido.</small>
                    </div> 
                    <div class="input"> 
                        <label for="rg">RG do Inscrito: <span id="point">*</span></label> 
                        <input type="text" id="rg" name="RG_inscrito" required /> 
                        <small id="rgError" style="color: red; display: none;">RG inválido. O RG deve ter entre 7 e 15 caracteres alfanuméricos.</small>
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

                <div class="right-section"> 
                    <div class="input"> 
                        <label for="nome_responsavel">Nome do Responsável: <span id="point">*</span></label> 
                        <input type="text" id="nome_responsavel" name="nome_responsavel" required /> 
                    </div> 
                    <div class="input"> 
                        <label for="cpf_responsavel">CPF do Responsável: <span id="point">*</span></label> 
                        <input type="text" id="cpf_responsavel" name="cpf_responsavel" required /> 
                        <small id="cpfRespError" style="color: red; display: none;">CPF do Responsável inválido.</small>
                    </div> 
                    <div class="input"> 
                        <label for="rg_responsavel">RG do Responsável: <span id="point">*</span></label> 
                        <input type="text" id="rg_responsavel" name="rg_responsavel" required /> 
                        <small id="rgRespError" style="color: red; display: none;">RG do Responsável inválido.</small>
                    </div> 
                    <div class="input"> 
                        <label for="email_responsavel">E-mail do Responsável: <span id="point">*</span></label> 
                        <input type="email" id="email_responsavel" name="email_responsavel" required /> 
                    </div> 
                    <div class="input"> 
                        <label for="telefone_responsavel">Telefone do Responsável: <span id="point">*</span></label> 
                        <input type="text" id="telefone_responsavel" name="telefone_responsavel" required /> 
                    </div> 
                    <div class="button-container">
                        <button type="submit" id="proximo">Próximo</button>
                    </div>
                </div> 
            </div> 
        </form> 
    </div> 
</div>

<script>
    // Validação de CPF usando expressão regular
    function validarCPF(cpf) {
        cpf = cpf.replace(/\D/g, ''); // Remove tudo o que não for número
        if (cpf.length !== 11 || /(\d)\1{10}/.test(cpf)) return false;
        
        let soma = 0;
        for (let i = 1; i <= 9; i++) soma += parseInt(cpf[i - 1]) * (11 - i);
        let resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf[9])) return false;
        
        soma = 0;
        for (let i = 1; i <= 10; i++) soma += parseInt(cpf[i - 1]) * (12 - i);
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        return resto === parseInt(cpf[10]);
    }

    // Validação de RG: entre 7 a 15 caracteres alfanuméricos
    function validarRG(rg) {
        return /^[a-zA-Z0-9]{7,15}$/.test(rg);
    }

    // Validação de Data de Nascimento: Verifica se a idade é 18 anos ou mais
    function validarIdade(dataNascimento) {
        const nascimento = new Date(dataNascimento);
        const hoje = new Date();
        let idade = hoje.getFullYear() - nascimento.getFullYear();
        const mesNascimento = nascimento.getMonth();
        const diaNascimento = nascimento.getDate();
        const mesAtual = hoje.getMonth();
        const diaAtual = hoje.getDate();
        
        if (mesAtual < mesNascimento || (mesAtual === mesNascimento && diaAtual < diaNascimento)) {
            idade--;
        }
        
        return idade < 18; // Retorna true se a idade for menor que 18
    }

    // Função para mostrar/ocultar o campo de especificação da deficiência
    document.getElementById('deficiência').addEventListener('change', function() {
        const deficienciaQualField = document.getElementById('deficiencia_qual');
        if (this.value === 'sim') {
            deficienciaQualField.style.display = 'inline';
        } else {
            deficienciaQualField.style.display = 'none';
        }
    });

    // Validação no envio do formulário
    document.getElementById('cadastroForm').addEventListener('submit', function(event) {
        let isValid = true;

        // Validação do CPF Inscrito
        let cpfInscrito = document.getElementById('cpf').value;
        if (!validarCPF(cpfInscrito)) {
            document.getElementById('cpfError').style.display = 'inline';
            isValid = false;
        } else {
            document.getElementById('cpfError').style.display = 'none';
        }

        // Validação do RG Inscrito
        let rgInscrito = document.getElementById('rg').value;
        if (!validarRG(rgInscrito)) {
            document.getElementById('rgError').style.display = 'inline';
            isValid = false;
        } else {
            document.getElementById('rgError').style.display = 'none';
        }

        // Validação da Idade (Data de Nascimento)
        let dataNascimento = document.getElementById('data_nascimento').value;
        if (!validarIdade(dataNascimento)) {
            alert("O inscrito não pode ter 18 anos ou mais.");
            isValid = false;
        }

        // Validação do CPF do Responsável
        let cpfResponsavel = document.getElementById('cpf_responsavel').value;
        if (!validarCPF(cpfResponsavel)) {
            document.getElementById('cpfRespError').style.display = 'inline';
            isValid = false;
        } else {
            document.getElementById('cpfRespError').style.display = 'none';
        }

        // Validação do RG do Responsável
        let rgResponsavel = document.getElementById('rg_responsavel').value;
        if (!validarRG(rgResponsavel)) {
            document.getElementById('rgRespError').style.display = 'inline';
            isValid = false;
        } else {
            document.getElementById('rgRespError').style.display = 'none';
        }

        // Validação da deficiência
        let deficiencia = document.getElementById('deficiência').value;
        if (deficiencia === 'sim') {
            let deficienciaQual = document.getElementById('deficiencia_qual').value.trim();
            if (deficienciaQual === '') {
                alert("Por favor, especifique a deficiência.");
                isValid = false;
            }
        }

        if (!isValid) {
            event.preventDefault(); // Impede o envio do formulário se a validação falhar
        }
    });
</script>

<?php include_once('./templetes/footer.php'); ?> 
