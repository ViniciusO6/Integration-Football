<?php
session_start(); // Inicie a sessão no início do arquivo
$imports = [
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
];

$titulo = 'Página de Cadastro para Responsáveis';
$pageCSS = ["cadastroAdulto.css"];
include_once('./templetes/menu.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_SESSION['telefone_inscrito']);

    $_SESSION['Cpf_inscrito'] = $_POST['cpf_inscrito'] ?? '';
    $_SESSION['RG_inscrito'] = $_POST['rg_inscrito'] ?? '';
    $_SESSION['data_nasc'] = $_POST['data_nasc'] ?? '';
    $_SESSION['genero_inscrito'] = $_POST['genero_inscrito'] ?? '';
    $_SESSION['deficiencia'] = $_POST['deficiencia'] ?? '';
    $_SESSION['deficiencia_qual'] = $_POST['deficiencia_qual'] ?? '';
    // $_SESSION['senha_inscrito'] = $_POST['senha_inscrito'];


    header("Location: CadastroUnidades.php");
    exit;
}
?>

<div class="container">
    <div class="card">
        <h1 class="card-title">2. DADOS PESSOAIS</h1>
        <img src="Imagens/Cadastro/cadastroMaior.png" alt="Imagem de Cadastro" class="input-image" />
        <form action="" method="POST" id="cadastroForm"> 
            <div class="input-container">
            
            <label for="cpf">CPF : <span id="point">*</span></label>
            <input type="text" id="cpf" name="cpf_inscrito" required />
            <span class="error-message" id="cpf-error"></span>
                <br /><br />

            <label for="rg">RG:<span id="point">*</span></label>
            <input type="text" id="rg" name="rg_inscrito" required />
             <span class="error-message" id="rg-error"></span>
            <br /><br />


                <label for="data_nascimento">Data de Nascimento <span id="point">*</span></label>
                <input type="date" id="data_nascimento" name="data_nasc" required />
                <br /><br />

                <label for="genero">Gênero <span id="point">*</span></label>
                <select id="genero" name="genero_inscrito" required>
                    <option value="" disabled selected>Selecione seu gênero</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
                <br /><br />

                <label for="deficiencia">Possui deficiência? Se sim, qual? <span id="point">*</span></label>
                <select id="deficiencia" name="deficiencia" required>
                    <option value="" disabled selected>Selecione</option>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
                <input type="text" id="deficiencia_qual" name="deficiencia_qual" placeholder="Especifique" style="display:none;" />
                <br /><br />

            </div>

            <div class="button-container">
                <button type="submit" id="proximo">Próximo</button>
            </div>
        </form>
    </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const cpfInput = document.getElementById('cpf');
    const cpfError = document.getElementById('cpf-error');
    const rgInput = document.getElementById('rg');
    const rgError = document.getElementById('rg-error');
    const deficienciaSelect = document.getElementById('deficiencia');
    const deficienciaQualInput = document.getElementById('deficiencia_qual');
    const dataNascimentoInput = document.getElementById('data_nascimento');
    const senhaInput = document.getElementById('senha_inscrito');
    const form = document.getElementById('cadastroForm');

    // Mostrar/ocultar campo de descrição de deficiência
    deficienciaSelect.addEventListener('change', function () {
        if (this.value === 'sim') {
            deficienciaQualInput.style.display = 'block';
        } else {
            deficienciaQualInput.style.display = 'none';
            deficienciaQualInput.value = '';
        }
    });

    // Validação e formatação do CPF
    cpfInput.addEventListener('input', function() {
        let cpf = cpfInput.value.replace(/\D/g, '');
        if (cpf.length > 11) cpf = cpf.slice(0, 11);
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        cpfInput.value = cpf;
        cpfError.textContent = ''; // Limpar mensagem ao digitar novamente
    });

    cpfInput.addEventListener('blur', function() {
        const cpf = cpfInput.value.replace(/\D/g, '');
        if (cpf.length !== 11) {
            cpfError.textContent = 'CPF inválido. Verifique o número.';
        } else {
            cpfError.textContent = '';
        }
    });

    // Validação e formatação do RG
    rgInput.addEventListener('input', function() {
        let rg = rgInput.value.replace(/\D/g, '');
        if (rg.length > 9) rg = rg.slice(0, 9);
        rg = rg.replace(/(\d{2})(\d)/, '$1.$2');
        rg = rg.replace(/(\d{3})(\d)/, '$1.$2');
        rg = rg.replace(/(\d{3})(\d{1})$/, '$1-$2');
        rgInput.value = rg;
        rgError.textContent = ''; // Limpar mensagem ao digitar novamente
    });

    rgInput.addEventListener('blur', function() {
        const rg = rgInput.value.replace(/\D/g, '');
        if (rg.length !== 9) {
            rgError.textContent = 'RG inválido. Verifique o número.';
        } else {
            rgError.textContent = '';
        }
    });

    // Validação da data de nascimento (idade mínima de 18 anos)
    dataNascimentoInput.addEventListener('blur', function() {
        const dataNascimento = new Date(dataNascimentoInput.value);
        const hoje = new Date();
        const idadeMinima = new Date(hoje.getFullYear() - 18, hoje.getMonth(), hoje.getDate());

        if (dataNascimento > idadeMinima || isNaN(dataNascimento)) {
            alert('Você deve ter pelo menos 18 anos.');
            dataNascimentoInput.value = '';
        }
    });

    // Validação da senha (mínimo de 8 caracteres)
    form.addEventListener('submit', function(event) {
        if (senhaInput.value.length < 8) {
            alert('A senha deve ter pelo menos 8 caracteres.');
            event.preventDefault();
        }
    });
});


</script>

<?php include_once('./templetes/footer.php'); ?>
</div> <!-- Fim do container -->
