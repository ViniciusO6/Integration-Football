<?php
session_start(); // Inicie a sessão

$imports = [
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Página Escolha de unidade';
$pageCSS = ["cadastrounidade.css"];

include_once('./templetes/index.php');
?>
<div class="container">
    <div class="card">
        <h1 class="card-title">3. ESCOLHA A UNIDADE</h1>
        <form action="cadastrounidade.php" method="POST"> <!-- Usar POST -->
        <div class="image-container">
                    <img src="Imagens/cadastrounidade.png" alt="Imagem de Cadastro" class="input-image" />
                </div>
        <div class="input-container">
    
    

                <div class="input">
                        <label for="pesquisa">Digite o nome do bairro, CEP ou cidade que deseja encontrar a unidade mais próxima: <span id="point">*</span></label>
                        <input type="text" id="pesquisa" name="pesquisa" required />
                    </div>
</div>
                    <div class="button-container">
                <button type="submit" id="proximo">Próximo</button>
            </div>
        </form>
</div>
        <?php include_once('./templetes/footer.php'); ?>
        </div> <!-- Fim do container -->