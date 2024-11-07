<?php
// Os imports são usados para adicionar links de fontes e bibliotecas externas no HTML
// No caso, estão substituindo as tradicionais tags <link rel="stylesheet">
$imports = [
  "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap", // Importando fonte "Poppins"
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", // Importando ícones do Font Awesome
  "https://fonts.gstatic.com/", // Link necessário para funcionar fontes do Google
  "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap",// Importando fontes adicionais
  "https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap",
  "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"

];

// Variáveis que armazenam o título da página, os arquivos CSS e JS específicos da página
$titulo = 'Contatos'; // Título da página

$pageCSS = ["index.css"]; // Arquivo CSS específico da página
$pageJS = ["index.js"]; // Arquivo JS específico da página
$pageCSS = ["contatos.css"]; // Arquivo CSS dos Cards


// Inclui o arquivo index.php que contém a estrutura base da página
include_once('./templetes/index.php');
?>


<div class="container">

    <div class="titulo">
    <h1>FALE CONOSCO</h1>
    </div><!-- Fecha titulo -->

    <div class = "imagens">
   
    <div class="mensagem">
      <img src="./Imagens/Contatos/mensagem.png" alt="mensagem">
      <h2>+ CONTATO</h2>
      <p>integrationfootball.central@gmail.com</p>
      </div>

      <div class="ligar">
      <img src="./Imagens/Contatos/ligar.png" alt="ligar">
      <h2>CENTRAL DE MATRÍCULAS</h2>
      <p>(11) 93244-5464<br>(11) 98753-8346</p>
      </div>

      <div class="mapa">
      <img src="./Imagens/Contatos/mapa.png" alt="mapa">
      <h2>MAPA DE UNIDADES</h2>
      <p>Localize a unidade mais próxima<br> através do nosso mapa<br> de unidades</p>
      </div>

</div>



</div><!-- Fecha container -->

<?php
// Inclui o arquivo do rodapé (footer.php)
include_once('./templetes/footer.php');
?>





