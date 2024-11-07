<?php
// Os imports são usados para adicionar links de fontes e bibliotecas externas no HTML
$imports = [
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", // Importando ícones do Font Awesome
  "https://fonts.gstatic.com/", // Link necessário para funcionar fontes do Google
  "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"

];

// Variáveis que armazenam o título da página, os arquivos CSS e JS específicos da página
$titulo = 'Futebol de 5'; // Título da página
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
          <img src="./Imagens/Futebol_5/imagemPrincipal.jpg" alt="Power_Soccer1">
        </div><!--img-topo-site-->
        <div class="txt-topo-site">
          <h1>Futebol de 5 <img id="icon-card" src="./Imagens/Futebol_5/visual.png" alt=""></h1>
          <p>Futebol para Cegos</p><br>
          <p>O Futebol de 5, também conhecido como Futebol Para Cegos, é um esporte adaptado para pessoas com deficiência visual. As partidas são realizadas em quadras fechadas e os jogadores, usando vendas nos olhos, contam com a ajuda de guias e de uma bola que emite som. Cada equipe é composta por cinco atletas, sendo um goleiro e quatro jogadores de linha. As regras são semelhantes às do futebol convencional, com objetivos de passes, dribles e gols, promovendo inclusão e competitividade entre os participantes.</p>        </div><!--txt-topo-site-->
      </div><!--flex-->
    </div><!--interface-->
  </section><!--primeira-parte-->

  <!--TOPO SEGUNDA PARTE (VÍDEO E EXPLICAÇÃO)-->
  <section class="segunda-parte">
    <div class="interface-video">
      <div class="flex1">
        <div class="txt-topo-site">
          <h2>Como começou o Futebol para 5? </h2>
          <p>O Futebol de 5 foi introduzido na década de 1990 e rapidamente ganhou popularidade, levando à criação de ligas e competições em todo o mundo. Com uma mistura de habilidades técnicas, estratégia e trabalho em equipe, o esporte promove a inclusão de atletas com deficiência visual e estimula uma competição saudável. Desde então, tem transformado vidas e desafiado estereótipos sobre as capacidades dos atletas.</p><br>        </div><!--txt-topo-site-->
        <div class="video-topo-site">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/RMfqlJmAOhE?si=z28NTXu_j3q4U1dA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>        </div><!--video-topo-site-->
      </div><!--flex-->
    </div><!--interface-->
    <div class="triangulo"></div> <!-- Elemento decorativo (triângulo) -->
  </section><!--segunda-parte-->

  <div class="fundo-azul">
    <div class="curva"></div>
    <div class="txt-topo-site1"> 
      <h1>Por dentro do Futebol de 5! <img id="icon-card" alt=""></h1>

      <div class="gallery">
        <img src="Imagens/Futebol_5/foto1.jpg" alt="Foto 1">
        <img src="Imagens/Futebol_5/foto2.jpg" alt="Foto 2">
        <img src="Imagens/Futebol_5/foto3.jpg" alt="Foto 3">
        <img src="Imagens/Futebol_5/foto4.jpg" alt="Foto 4">
        <img src="Imagens/Futebol_5/foto5.jpg" alt="Foto 5">
        <img src="Imagens/Futebol_5/foto6.jpg" alt="Foto 6">
      </div><!--gallery-->
    </div><!--txt-topo-site-->
  </div><!--fundo-azul-->

  <div class="img-inscrever"> 
    <img src="Imagens/Futebol_5/img-inscrever.jpg" alt="">
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
