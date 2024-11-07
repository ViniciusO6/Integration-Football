<?php
session_start(); // Inicie a sessão

$imports =[
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  ];

$titulo = 'Página de Cadastro';
$pageCSS = ["cadastro.css"];

include_once('./templetes/menu.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário e armazena na sessão
    $_SESSION['nome_inscrito'] = $_POST['nome_inscrito'];
    $_SESSION['email_inscrito'] = $_POST['email_inscrito'];
    $_SESSION['telefone_inscrito'] = $_POST['telefone_inscrito'];
    $_SESSION['idade'] = $_POST['idade'];

    // Debugging: Verifica os valores capturados
    // var_dump($_SESSION['nome_inscrito'], $_SESSION['email_inscrito'], $_SESSION['telefone_inscrito']);

    // Redireciona baseado na seleção de idade
    header("Location: " . ($_SESSION['idade'] === 'maior' ? "CadastroInfantil.php" : "CadastroAdulto.php"));
    exit();
}
?>
<div class="container">
    <div class="card">
        <div class="form-img">
            <h1 class="card-title">1. INFORMAÇÕES BÁSICAS</h1>
            <br><br>

            <form id="cadastroForm" method="POST">
                <div class="input-container">
                    <img src="Imagens/Cadastro/cadastro1.png" alt="Imagem de Cadastro" class="input-image" />
                    <div class="input">
                        <label for="nome">Nome completo <span id="point">*</span></label>
                        <input type="text" name="nome_inscrito" required />
                        <br /><br />

                        <label for="email">E-mail para contato <span id="point">*</span></label>
                        <input type="email" name="email_inscrito" required />
                        <br /><br />

                        <label for="telefone">Telefone para contato <span id="point">*</span></label>
                        <input type="tel" name="telefone_inscrito" required />
                    </div>
                </div>

                <br /><br />

                <div class="option">
                    <input class="form-check-input" type="radio" value="maior" id="maior" name="idade" required>
                    <label class="form-check-label" for="maior">Sou maior de idade (18 anos ou mais)</label>
                </div>
               
                <div class="option">
                    <input class="form-check-input" type="radio" value="menor" id="menor" name="idade" required>
                    <label class="form-check-label" for="menor">Sou menor de idade (menos de 18)</label>
                </div>

                <div class="button-container">
                    <button type="submit" id="proximo">Próximo</button>
                </div>
            </form>
        </div>
    </div>

    <?php include_once('./templetes/footer.php'); ?>
</div> <!-- Fim do container -->
