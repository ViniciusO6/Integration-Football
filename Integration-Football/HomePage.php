<?php 

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
  $imports =[
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  ];
  $titulo = 'HomePage';
  $pageCSS = ["home.css"];
  $pageJS = ["index.js"];

  include_once('./templetes/menu.php');

?>



<div class="container">

  <!-- CARROSSEL -->
<section class="carrosel">
  <div class="carrosel-content">
    <input name="carrosel-radio" type="radio" id="radio1">
    <input name="carrosel-radio" type="radio" id="radio2">
    <input name="carrosel-radio" type="radio" id="radio3">
    

    <div class="carrosel-box primary ">
      <img class="img-desktop" src="Imagens/HomePage/Carrossel/Slide-1.jpg" alt="Slide 1">
      <img class="img-mobile" src="Imagens/HomePage/Carrossel/Slide-Mobile-1.jpg" alt="Slide 1">
    </div>

    <div class="carrosel-box ">
      <img class="img-desktop" src="Imagens/HomePage/Carrossel/Slide-2.jpg" alt="Slide 1">
      <img class="img-mobile" src="Imagens/HomePage/Carrossel/Slide-Mobile-2.jpg" alt="Slide 1">
    </div>

    <div class="carrosel-box ">
      <img class="img-desktop" src="Imagens/HomePage/Carrossel/Slide-3.jpg" alt="Slide 1">
      <img class="img-mobile" src="Imagens/HomePage/Carrossel/Slide-Mobile-3.jpg" alt="Slide 1">
    </div>
  
    <div class="nav-auto">
      <div class="auto-btn1"></div>
      <div class="auto-btn2"></div>
      <div class="auto-btn3"></div>
    </div>

    <div class="nav-manual">   
      <label onclick="imagem(1)" for="radio1" id="manual-btn1" class="manual-btn"></label>
      <label onclick="imagem(2)" for="radio2" id="manual-btn2" class="manual-btn"></label>
      <label onclick="imagem(3)" for="radio3" id="manual-btn3" class="manual-btn"></label>
    </div>

    <div id="setas">
      <div id="seta-esquerda"><img onclick="voltar()" src="Imagens/HomePage/Carrossel/seta-esquerda.svg" alt=""></div>
      <div id="seta-direita"><img onclick="avancar()" src="Imagens/HomePage/Carrossel/seta-direita.svg" alt=""></div>
    </div>
    <div id="text-carrosel">
      <h1>CONHEÇA ALGUMAS DE NOSSAS AÇÕES</h1>
          <p>Aqui acreditamos que o esporte é uma poderosa ferramenta de integração, superação e empoderamento.</p>
          <button id="btn-saiba-mais" type="button" onclick="window.location.href='#modalidades';">
            Saiba Mais
          </button>
    </div> 

  </div>
  
  <div id="triangulo"></div>
</section>

  
<!-- BLOCO DE MODALIDADES -->
<div id="modalidades">
    
  <div id="titulo">
    <h1>Nossas Modalidades</h1>
  </div>

  <div id="blocos">

  <div id="bloco1" class="bloco" onclick="window.location.href='Power_Soccer.php'">
  <div class="image-placeholder" style="background-image: url('Imagens/HomePage/Modalidades/power-soccer.png');"></div>
    <div class="vertical-line"></div>
    <div class="content">
        <h2>Power Soccer <img id="icon-card" src="Imagens/HomePage/Modalidades/icon-player.png" alt="">   </h2>
        <div class="divider"></div>
        <p>É uma modalidade de futebol adaptado para cadeirantes. Jogadores utilizam cadeiras de rodas motorizadas para competir, focando na habilidade, estratégia e trabalho em equipe.</p>    
    </div>
  </div>

  <div id="bloco2" class="bloco" onclick="window.location.href='Futebol_5.php'">
  <img class="image-placeholder" style="background-image: url('Imagens/HomePage/Modalidades/futebol-de-5.jpeg');">
    <div class="vertical-line"></div>
    <div class="content">
        <h2>Futebol de 5 <img id="icon-card" src="Imagens/HomePage/Modalidades/icon-mask.png" alt="">   </h2>
        <div class="divider"></div>
        <p>É uma modalidade adaptada para pessoas com deficiência visual. Jogadores usam vendas para garantir a igualdade e contam com um guia que orienta durante a partida. </p>
    </div>
  </div>

  <div id="bloco3" class="bloco" onclick="window.location.href='Walking_Football.php'">
  <img class="image-placeholder" style="background-image: url('Imagens/HomePage/Modalidades/walking-football.jpg');">
    <div class="vertical-line"></div>
    <div class="content">
        <h2>Walking Football <img id="icon-card" src="Imagens/HomePage/Modalidades/icon-person.png" alt="">   </h2>
        <div class="divider"></div>
        <p>É uma versão adaptada do futebol, projetada para jogadores mais velhos ou com mobilidade reduzida. As regras proíbem correr, incentivando uma prática mais segura e social.</p>
    </div>
  </div>
</div>

</div> <!-- DIVISÃO -->

  <!-- BLOCO DO VÍDEO -->
  <div id="content-info">
    <div id="curva"></div>

    <div id="texto-info">

    <div id="text-1">
      <h1>Qual o impacto do esporte em nossas vidas?</h1>
      <p>Drauzio Varella é médico cancerologista e escritor. Foi um dos pioneiros no tratamento da aids no Brasil. Entre seus livros de maior sucesso estão Estação Carandiru, Por um Fio e O Médico Doente</p>
    </div>

    <div id="block-text1">
      <div><img src="Imagens/HomePage/Bloco_Video/strong.png" alt=""></div>
      <div>
        <h1>Saúde Física</h1>
        <p>Esportes ajudam a fortalecer os músculos, melhorar a resistência cardiovascular, aumentar a flexibilidade e manter um peso saudável.</p>
      </div>
    </div>

    <div id="block-text2">
      <div><img src="Imagens/HomePage/Bloco_Video/calm.png" alt=""></div>
      <div>
        <h1>Saúde Mental</h1>
        <p> Atividades físicas liberam endorfinas, que são hormônios responsáveis pela sensação de bem-estar.</p>
      </div>
    </div>

    <div id="block-text3">
      <div><img src="Imagens/HomePage/Bloco_Video/community.png" alt=""></div>
      <div>
        <h1>Desenvolvimento Social</h1>
        <p>A prática de esporte melhora as habilidades sociais, como comunicação, trabalho em equipe e liderança. Além disso, habilidades como foco, disciplina e empatia também são desenvolvidas.</p>
      </div>
    </div>

    </div>

    <div id="video-info">
      <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/Gnh3dwps_jE?si=Tu1JGGvra_NQnnzV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div id="frase">
          <p>"Não fique parado, nascemos para estar sempre em movimento."</p>
        </div>
         </div>
    </div>

    <!-- AVALIAÇÕES -->
    <div id="avaliacoes">

      <div id="comentario">
        <h1>Avaliações</h1>
        <p id="comentario-perfil">"Queria compartilhar minha experiencia incrivel com a instituição de futebol inclusivo. desde que comecei a participar, me senti parte de uma familia. A equipe é super acolhedora e os treinos são adaptados para todos, o que faz toda a diferença"</p>
      </div><br>


     <div id="estrelas">
        <img src="Imagens/HomePage/Perfil-img/estrelas.png" alt="">
      </div>

      <div id="carrosel-perfil">
        <div id="principal">

          <div id="perfil1">
            <div id="foto1"></div>
            <p>Valentina Moraes</p>
          </div>
          <div id="perfil2">
            <div id="foto2"></div>
            <p>Carmem Luvinei</p>
          </div>
          <div id="perfil3">
            <div id="foto3"></div>
            <p>José da Silva</p>
          </div>
          <div id="perfil4">
            <div id="foto4"></div>
            <p>Claudionei Santos</p>
          </div>
          <div id="perfil5">
            <div id="foto5"></div>
            <p>Cassia Gomes</p>
          </div>

        </div>

      </div>

    </div>





</div>

<?php 
  include_once('./templetes/footer.php');
?>




 
