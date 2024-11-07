<?php
// Os imports são usados para adicionar links de fontes e bibliotecas externas no HTML
$imports = [
  "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap", // Importando fonte "Poppins"
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", // Importando ícones do Font Awesome
  "https://fonts.gstatic.com/", // Link necessário para funcionar fontes do Google
  "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap", // Importando fontes adicionais
  "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap",
  "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"

];

// Variáveis que armazenam o título da página, os arquivos CSS e JS específicos da página
$titulo = 'Futebol de 5'; // Título da página

$pageCSS = ["index.css"]; // Arquivo CSS específico da página
$pageJS = ["index.js"]; // Arquivo JS específico da página
$pageCSS = ["modalidades.css"]; // Arquivo CSS dos Cards

// Inclui o arquivo index.php que contém a estrutura base da página
include_once('./templetes/index.php');
?>


<div class= "container">
    <div class = "titulo">
       <h1>Conheça mais sobre nossas modalidades:</h1>
    </div>
 <div class="card-container">
    <div class="card" >
    <a href="Mulheres.php">
    <h2>MULHERES NO FUTEBOL</h2>
    <div class="parte">
   <p>Incentivo ao crescimento feminino no cenário esportivo</p>
   <div class="image">
   <img id="icon-card" src="./Imagens/Mulheres/mulher.png" alt=""> </div> </div>
   </a>
</div>

    <div class="card">
    <a href="Power_Soccer.php">
    <h2>POWER SOCCER</h2>
    <div class="parte">
    <p>Futebol adaptado para pessoas portadoras de deficiência motora</p>
    <div class="image">
    <img id="icon-card" src="./Imagens/Power_Soccer/jogador.png" alt=""></div> </div>
    </a>
    </div>

    <div class="card">
    <a href="Futebol_5.php">
    <h2>FUTEBOL DE 5</h2>
    <div class="parte">
    <p>Futebol adaptado para pessoas com deficiência visual</p>
    <div class="image">         
    <img id="icon-card" src="./Imagens/Futebol_5/visual.png" alt=""></div></div>
    </a>
    </div>


    <div class="card">
    <a href="Futsal.php">
    <h2>FUTSAL</h2>
    <div class="parte">
    <p>Esporte praticado em quadra fechada, com 5 jogadores em cada time</p>
    <div class="image">  
    <img id="icon-card" src="./Imagens/Futsal/jogador.png" alt="">  </div> </div>
    </a>
     </div>

 </div>
</div>


<?php
// Inclui o arquivo do rodapé (footer.php)
include_once('./templetes/footer.php');
?>
