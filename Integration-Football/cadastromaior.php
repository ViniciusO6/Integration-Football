<?php
session_start(); // Inicie a sessão no início do arquivo

$imports = [
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];

$titulo = 'Página de Cadastro2';
$pageCSS = ["Cadastromaior.css"];
include_once('./templetes/index.php');

// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture os dados do formulário e armazene na sessão
    $_SESSION['cpf_inscrito'] = $_POST['cpf_inscrito'] ?? '';
    $_SESSION['rg_inscrito'] = $_POST['rg_inscrito'] ?? '';
    $_SESSION['data_nasc'] = $_POST['data_nasc'] ?? '';
    $_SESSION['genero_inscrito'] = $_POST['genero_inscrito'] ?? '';
    $_SESSION['deficiencia'] = $_POST['deficiencia'] ?? '';
    $_SESSION['deficiencia_qual'] = $_POST['deficiencia_qual'] ?? '';
    $_SESSION['telefone_inscrito'] = $_POST['telefone_inscrito'] ?? ''; // Alterado para telefone_inscrito

    // Redireciona para a página cadastroUnidade.php
    header("Location: cadastroUnidade.php");
    exit; // Garante que o script seja encerrado após o redirecionamento
}
?>

<div class="container">
    <div class="card">
        <div class="left-section">
            <h1 class="card-title">2. DADOS PESSOAIS</h1>
            <form action="" method="POST"> <!-- Ação deve ser a própria página -->
                <div class="input-container">
                    <label for="cpf">CPF : <span id="point">*</span></label>
                    <input type="text" id="cpf" name="cpf_inscrito" required />
                    <br /><br />

                    <label for="rg">RG:<span id="point">*</span></label>
                    <input type="text" id="rg" name="rg_inscrito" required />
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

                    <label for="telefone_inscrito">Telefone para contato <span id="point">*</span></label>
                    <input type="tel" id="telefone_inscrito" name="telefone_inscrito" required />
                </div>

                <div class="button-container">
                    <button type="submit" id="proximo">Próximo</button>
                </div>
            </form>
        </div>
        <div class="right-section">
            <img src="Imagens/cadastroMaior.png" alt="Imagem de Cadastro" class="input-image" />
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const telefoneContatoInput = document.getElementById('telefone_inscrito');
            const deficienciaSelect = document.getElementById('deficiencia');
            const deficienciaQualInput = document.getElementById('deficiencia_qual');

            // Máscara de telefone
            telefoneContatoInput.addEventListener('input', function () {
                const inputValue = this.value.replace(/\D/g, '');
                const maskedValue = inputValue.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3').replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
                this.value = maskedValue;
            });

            // Exibe o campo de especificação de deficiência se "Sim" for selecionado
            deficienciaSelect.addEventListener('change', function () {
                if (this.value === 'sim') {
                    deficienciaQualInput.style.display = 'block';
                } else {
                    deficienciaQualInput.style.display = 'none';
                    deficienciaQualInput.value = ''; // Limpa o campo se "Não" for selecionado
                }
            });
        });
    </script>

    <?php include_once('./templetes/footer.php'); ?>
</div> <!-- Fim do container -->
