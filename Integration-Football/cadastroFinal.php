<?php
session_start(); // Inicie a sessão

$imports = [
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Página Final';
$pageCSS = ["cadastrofinal.css"];

include_once('./templetes/index.php');
?>
<div class="container">
    <div class="card">
        <h1 class="card-title">SUA INSCRIÇÃO ESTÁ EM ANÁLISE</h1>
        <form action="cadastroFinal.php" method="POST"> <!-- Usar POST -->
            <div class="card-container">
            <img src="Imagens/cadastroFinal.png" alt="Imagem de Cadastro" class="image-container" />
        </div>
            <h2 class="card-title2">Bem-vindo à nossa página de ánalise de inscrição!!</h2>

           <h3 class="card-title3"> Aqui, realizamos uma avaliação detalhada de cada candidatura, considerando os critérios estabelecidos para garantir que todos os requisitos sejam atendidos. Nosso processo é rigoroso, mas transparente, e visa oferecer oportunidades justas para todos os participantes. Fique tranquilo, você receberá um retorno sobre o status da sua inscrição em breve via e-mail e telefone, entre 3 a 5 dias.</h3>

           <h4 class="card-title">Agradecemos seu interesse e desempenho!</h4>


           <div class="button-container">
    <button type="button" id="Voltar" onclick="window.location.href='cadastro.php'">Voltar à página principal</button>
</div>



        </form>
    </div>
</div>
</div>

<?php include_once('./templetes/footer.php'); ?>

