<?php
session_start(); // Inicie a sessão

$imports = [
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Página Escolha de Modalidade';
$pageCSS = ["cadastroModali.css"];

include_once('./templetes/index.php');
?>
<div class="container">
    <div class="card">
        <h1 class="card-title">4. ESCOLHA A MODALIDADE</h1>
        <form action="cadastroModalidade.php" method="POST"> <!-- Usar POST -->
            <div class="card-container">
                <div class="mini-card">
                    <h3>POWER SOCCER</h3>
                    <img src="Imagens/PowerSoccer.png" alt="Imagem de Cadastro" class="image-container" />
                    
                    <button type="submit" name="modalidade" value="modalidade1">Escolher</button>
                </div>
                <div class="mini-card">
                    <h3>WALKING FOOTBALL</h3>
                    <img src="Imagens/WalkinFootaball.png" alt="Imagem de Cadastro" class="image-container2" />

                    <button type="submit" name="modalidade" value="modalidade2">Escolher</button>
                </div>
                <div class="mini-card">
                    <h3>FUTEBOL DE 5</h3>
                    <img src="Imagens/PowerSoccer.png" alt="Imagem de Cadastro" class="image-container3" />

                    <button type="submit" name="modalidade" value="modalidade3">Escolher</button>
                </div>
                <div class="mini-card">
                    <h3>POWER SOCCER</h3>
                    <img src="Imagens/PowerSoccer.png" alt="Imagem de Cadastro" class="image-container4" />

                    <button type="submit" name="modalidade" value="modalidade4">Escolher</button>
                </div>
                <div class="button-container">
                    <button type="submit" id="proximo">Próximo</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<?php include_once('./templetes/footer.php'); ?>

