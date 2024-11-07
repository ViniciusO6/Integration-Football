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
$titulo = 'Mulheres no Futebol'; // Título da página

$pageCSS = ["index.css"]; // Arquivo CSS específico da página
$pageJS = ["index.js"]; // Arquivo JS específico da página
$pageCSS = ["paginas_modalidades.css"]; // Arquivo CSS dos Cards

// Inclui o arquivo index.php que contém a estrutura base da página
include_once('./templetes/index.php');
?>

<!--TOPO PRIMEIRA PARTE(FOTO E EXPLICAÇÃO)-->
<div class="container">
  <section class="primeira-parte">
    <div class="interface">
      <div class="flex">
        <div class="img-topo-site">
          <img src="./Imagens/Mulheres/imagem2.jpg" alt="Power_Soccer1">
        </div><!--img-topo-site-->
        <div class="txt-topo-site">
          <h1>Futebol Feminino <img id="icon-card" src="./Imagens/Mulheres/mulher.png" alt=""></h1>
          <p>Mulheres no Esporte</p><br>
          <p>O futebol feminino é uma modalidade esportiva em crescente destaque, proporcionando um espaço para jovens mulheres se destacarem no esporte. Com competições em nível local, nacional e internacional, o futebol feminino promove não apenas a habilidade atlética, mas também a igualdade de gênero e o empoderamento. As jogadoras se destacam por sua técnica e força, inspirando novas gerações a seguir seus sonhos no campo. Com ligas organizadas e um aumento na visibilidade da mídia, o futebol feminino continua a conquistar cada vez mais fãs e apoiadores.</p>        </div><!--txt-topo-site-->
      </div><!--flex-->
    </div><!--interface-->
  </section><!--primeira-parte-->

  <!--TOPO SEGUNDA PARTE (VÍDEO E EXPLICAÇÃO)-->
  <section class="segunda-parte">
    <div class="interface-video">
      <div class="flex1">
        <div class="txt-topo-site">
          <h2>Como começou o Futebol Feminino? </h2>
          <p>O futebol feminino começou a se desenvolver no final do século XIX, com os primeiros jogos registrados na Grã-Bretanha. Apesar de um crescimento inicial, o esporte enfrentou resistência, especialmente após a proibição da Federação Inglesa em 1921. A partir da década de 1970, com o movimento pelos direitos das mulheres, o futebol feminino começou a ganhar força novamente, levando à criação de ligas e competições. Hoje, é uma modalidade reconhecida e em crescimento em todo o mundo.</p>        </div><!--txt-topo-site-->
        <div class="video-topo-site">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/8uuW-K4ieOo?si=3SEgerBlT4IFleKI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>        </div><!--video-topo-site-->
      </div><!--flex-->
    </div><!--interface-->
    <div class="triangulo"></div> <!-- Elemento decorativo (triângulo) -->
  </section><!--segunda-parte-->

  <div class="fundo-azul">
    <div class="curva"></div>
    <div class="txt-topo-site1"> 
      <h1>Por dentro do Futebol Feminino! <img id="icon-card" alt=""></h1>

      <div class="gallery">
        <img src="imagens/Mulheres/foto1.jpg" alt="Foto 1">
        <img src="imagens/Mulheres/foto2.jpg" alt="Foto 2">
        <img src="imagens/Mulheres/foto3.jpeg" alt="Foto 3">
        <img src="imagens/Mulheres/foto4.jpg" alt="Foto 4">
        <img src="imagens/Mulheres/foto5.jpg" alt="Foto 5">
        <img src="imagens/Mulheres/foto6.jpg" alt="Foto 6">
      </div><!--gallery-->
    </div><!--txt-topo-site-->
  </div><!--fundo-azul-->

  <div class="img-inscrever"> 
    <img src="imagens/Mulheres/img-inscrever.jpg" alt="">
    <div class="text-inscrever">
      <h1>SE INTERESSOU? NÃO PERCA TEMPO E SE INCREVA.</h1>
      <button id="btn-saiba-mais" type="button">INSCREVA-SE</button>
    </div><!-- text-inscrever -->
  </div><!-- img-inscrever -->
</div><!--container-->

<?php
// Inclui o arquivo do rodapé (footer.php)
include_once('./templetes/footer.php');
?>
