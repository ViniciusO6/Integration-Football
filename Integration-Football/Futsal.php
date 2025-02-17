<?php
// Os imports são usados para adicionar links de fontes e bibliotecas externas no HTML
$imports = [
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", // Importando ícones do Font Awesome
  "https://fonts.gstatic.com/", // Link necessário para funcionar fontes do Google
  "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"

];

// Variáveis que armazenam o título da página, os arquivos CSS e JS específicos da página
$titulo = 'Futsal'; // Título da página
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
          <img src="./Imagens/Futsal/futsal.jpg" alt="Power_Soccer1">
        </div><!--img-topo-site-->
        <div class="txt-topo-site">
          <h1>Futsal <img id="icon-card" src="./Imagens/Futsal/jogador.png" alt=""></h1>
          <p>Futebol de Quadra</p><br>
          <p>O Futsal é uma modalidade de futebol jogada em uma quadra coberta, com cinco jogadores em cada time. Este esporte é caracterizado por sua alta intensidade e agilidade, exigindo habilidades técnicas como passes precisos, dribles e finalizações rápidas. As partidas são disputadas em dois tempos de 20 minutos, com regras específicas que favorecem o jogo rápido e a interação entre os atletas. O Futsal promove não apenas a competição, mas também o trabalho em equipe e a inclusão, sendo uma excelente forma de desenvolver habilidades motoras e sociais entre os jogadores.</p>        </div><!--txt-topo-site-->
      </div><!--flex-->
    </div><!--interface-->
  </section><!--primeira-parte-->

<!--TOPO SEGUNDA PARTE (VÍDEO E EXPLICAÇÃO)-->
<section class="segunda-parte">
    <div class="interface-video">
    <div class="flex1">
        <div class="txt-topo-site">
        <h2>Como começou o Futsal?</h2>
        <p>O Futsal começou a ganhar destaque nos anos 1930 e rapidamente se popularizou, resultando na formação de ligas e competições ao redor do mundo. Combinando estratégia e habilidades técnicas, o esporte promove a inclusão e a competição saudável entre os atletas. Desde então, o Futsal tem se expandido globalmente, transformando vidas e desafiando estereótipos sobre as capacidades dos jogadores, tornando-se uma plataforma vital para o desenvolvimento esportivo e social.</p><br>     </div><!--txt-topo-site-->    
            <div class="video-topo-site">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/8iDl7y0-r20?si=i7ivSQLVi2v9U4i1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> 
            </div><!--video-topo-site-->
    </div><!--flex-->
    </div><!--interface-->
    <div class="triangulo"></div> <!-- Elemento decorativo (triângulo) -->
</section><!--segunda-parte-->

  <div class="fundo-azul">
    <div class="curva"></div>
    <div class="txt-topo-site1"> 
      <h1>Por dentro do Futsal! <img id="icon-card" alt=""></h1>

      <div class="gallery">
        <img src="imagens/Futsal/foto1.jpg" alt="Foto 1">
        <img src="imagens/Futsal/foto2.png" alt="Foto 2">
        <img src="imagens/Futsal/foto3.jpg" alt="Foto 3">
        <img src="imagens/Futsal/foto4.jpg" alt="Foto 4">
        <img src="imagens/Futsal/foto5.jpg" alt="Foto 5">
        <img src="imagens/Futsal/foto6.png" alt="Foto 6">
      </div><!--gallery-->
    </div><!--txt-topo-site-->
  </div><!--fundo-azul-->

  <div class="img-inscrever"> 
    <img src="imagens/Futsal/img-inscrever.jpg" alt="">
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
