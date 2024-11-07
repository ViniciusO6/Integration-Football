<?php
// Os imports são usados para adicionar links de fontes e bibliotecas externas no HTML
$imports = [
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", // Importando ícones do Font Awesome
  "https://fonts.gstatic.com/", // Link necessário para funcionar fontes do Google
  "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"

];

// Variáveis que armazenam o título da página, os arquivos CSS e JS específicos da página
$titulo = 'Walking Football'; // Título da página
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
          <img src="./Imagens/Walking/imagem_P.jpg" alt="Power_Soccer1">
        </div><!--img-topo-site-->
        <div class="txt-topo-site">
          <h1>Walking Football <img id="icon-card" src="./Imagens/Walking/futebol.png" alt=""></h1>
          <p>Futebol Caminhando</p>
          <p>Walking Football é uma versão adaptada do futebol para pessoas mais velhas ou com limitações físicas, onde a regra principal é que os jogadores não podem correr. A modalidade é jogada em campos de futebol tradicionais e as partidas seguem as regras do futebol convencional, com times de seis a sete jogadores. O foco do jogo é manter a atividade física, promover a inclusão e a socialização, enquanto respeita os limites de cada atleta.</p>
          </div><!--txt-topo-site-->
      </div><!--flex-->
    </div><!--interface-->
  </section><!--primeira-parte-->

  <!--TOPO SEGUNDA PARTE (VÍDEO E EXPLICAÇÃO)-->
  <section class="segunda-parte">
    <div class="interface-video">
      <div class="flex1">
        <div class="txt-topo-site">
          <h2>Como começou o Walking Football? </h2>
          <p>O Walking Football foi criado no Reino Unido nos anos 2000 para permitir que pessoas mais velhas continuem praticando futebol de maneira segura, com a regra de não correr. Com o tempo, o esporte se espalhou pelo mundo, promovendo saúde, inclusão e bem-estar. Ele oferece uma alternativa acessível para quem quer manter-se ativo, quebrando barreiras físicas e etárias no esporte.</p><br>
          </div><!--txt-topo-site-->
        <div class="video-topo-site">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/w27ZASj0xgU?si=9CAPpGzAPLGzG3ln" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div><!--video-topo-site-->
      </div><!--flex-->
    </div><!--interface-->
    <div class="triangulo"></div> <!-- Elemento decorativo (triângulo) -->
  </section><!--segunda-parte-->

  <div class="fundo-azul">
    <div class="curva"></div>
    <div class="txt-topo-site1"> 
      <h1>Por dentro do Walking Football! <img id="icon-card" alt=""></h1>

      <div class="gallery">
        <img src="Imagens/Walking/foto1.png" alt="Foto 1">
        <img src="Imagens/Walking/foto2.jpg" alt="Foto 2">
        <img src="Imagens/Walking/foto3.jpg" alt="Foto 3">
        <img src="Imagens/Walking/foto4.jpg" alt="Foto 4">
        <img src="Imagens/Walking/foto5.jpg" alt="Foto 5">
        <img src="Imagens/Walking/foto6.jpg" alt="Foto 6">
      </div><!--gallery-->
    </div><!--txt-topo-site-->
  </div><!--fundo-azul-->

  <div class="img-inscrever"> 
    <img src="Imagens/Walking/img-inscrever.jpg" alt="">
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
