<?php
// Os imports são usados para adicionar links de fontes e bibliotecas externas no HTML
$imports = [
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", // Importando ícones do Font Awesome
  "https://fonts.gstatic.com/", // Link necessário para funcionar fontes do Google
  "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"

];

// Variáveis que armazenam o título da página, os arquivos CSS e JS específicos da página
$titulo = 'Power Soccer'; // Título da página
$pageJS = ["index.js"]; // Arquivo JS específico da página
$pageCSS = ["paginas_modalidades.css"]; // Arquivo CSS dos Cards

// Inclui o arquivo index.php que contém a estrutura base da página
include_once('./templetes/menu.php');
?>

<!--TOPO PRIMEIRA PARTE(FOTO E EXPLICAÇÃO)-->
<div class="container">
  <section class="primeira-parte">
    <div class="interface">
      <div class="flex">
        <div class="img-topo-site">
          <img src="./Imagens/Power_Soccer/power_soccer1.jpg" alt="Power_Soccer1">
        </div><!--img-topo-site-->
        <div class="txt-topo-site">
          <h1>Power Soccer <img id="icon-card" src="./Imagens/Power_Soccer/jogador.png" alt=""></h1>
          <p>Futebol em Cadeira de Rodas</p>
          <p>Power Soccer, também conhecido como Futebol em Cadeira de Rodas, é um esporte adaptado para pessoas com deficiência motora que utilizam cadeiras de rodas motorizadas. Jogando em quadras internas, os atletas controlam suas cadeiras equipadas com escudos frontais para chutar e passar a bola. As partidas são disputadas por dois times de quatro jogadores, com regras semelhantes ao futebol tradicional, como gols, passes e dribles.</p>
        </div><!--txt-topo-site-->
      </div><!--flex-->
    </div><!--interface-->
  </section><!--primeira-parte-->

  <!--TOPO SEGUNDA PARTE (VÍDEO E EXPLICAÇÃO)-->
  <section class="segunda-parte">
    <div class="interface-video">
      <div class="flex1">
        <div class="txt-topo-site">
          <h2>Como começou o Power Soccer? </h2>
          <p> O primeiro torneio foi realizado em 1982, e rapidamente ganhou popularidade, levando à formação de ligas e competições. O esporte combina estratégia, habilidades técnicas e trabalho em equipe, promovendo não apenas a inclusão, mas também a competição saudável. Desde então, o Power Soccer se espalhou pelo mundo, transformando vidas e desafiando estereótipos sobre a capacidade dos atletas.</p><br>
        </div><!--txt-topo-site-->
        <div class="video-topo-site">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/OWhY7C64ILc?si=Ge2wSUPVtBJphFEI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>      
        </div><!--video-topo-site-->
      </div><!--flex-->
    </div><!--interface-->
    <div class="triangulo"></div> <!-- Elemento decorativo (triângulo) -->
  </section><!--segunda-parte-->

  <div class="fundo-azul">
    <div class="curva"></div>
    <div class="txt-topo-site1"> 
      <h1>Por dentro do Power Soccer! <img id="icon-card" alt=""></h1>

      <div class="gallery">
        <img src="Imagens/Power_Soccer/foto1.jpg" alt="Foto 1">
        <img src="Imagens/Power_Soccer/foto2.jpg" alt="Foto 2">
        <img src="Imagens/Power_Soccer/foto3.jpg" alt="Foto 3">
        <img src="Imagens/Power_Soccer/foto4.jpg" alt="Foto 4">
        <img src="Imagens/Power_Soccer/foto5.jpg" alt="Foto 5">
        <img src="Imagens/Power_Soccer/foto6.png" alt="Foto 6">
      </div><!--gallery-->
    </div><!--txt-topo-site-->
  </div><!--fundo-azul-->

  <div class="img-inscrever"> 
    <img src="Imagens/Power_Soccer/img-inscrever.jpg" alt="">
    <div class="text-inscrever">
      <h1>SE INTERESSOU? NÃO PERCA TEMPO.</h1>
      <button id="btn-saiba-mais" type="button" onclick="window.location.href='Cadastro.php';">INSCREVA-SE</button>
    </div><!-- text-inscrever -->
  </div><!-- img-inscrever -->
</div><!--container-->

<?php
// Inclui o arquivo do rodapé (footer.php)
include_once('./templetes/footer.php');
?>
