<?php 

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
  $imports =[
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
  ];
  $titulo = 'Home Page';
  $pageCSS = ["index.css"];
  $pageJS = ["index.js"];

  include_once('./templetes/index.php');

?>



<div class="container">


<section class="carrosel">
  <div class="carrosel-content">
    <input name="carrosel-radio" type="radio" id="radio1">
    <input name="carrosel-radio" type="radio" id="radio2">
    <input name="carrosel-radio" type="radio" id="radio3">
    

    <div class="carrosel-box primary ">
      <img class="img-desktop" src="./Imagens/Carrosel-img/Slide-1.jpg" alt="Slide 1">
      <img class="img-mobile" src="./Imagens/Carrosel-img/Slide-Mobile-1.jpg" alt="Slide 1">
    </div>

    <div class="carrosel-box ">
      <img class="img-desktop" src="./Imagens/Carrosel-img/Slide-2.jpg" alt="Slide 1">
      <img class="img-mobile" src="./Imagens/Carrosel-img/Slide-Mobile-2.jpg" alt="Slide 1">
    </div>

    <div class="carrosel-box ">
      <img class="img-desktop" src="./Imagens/Carrosel-img/Slide-3.jpg" alt="Slide 1">
      <img class="img-mobile" src="./Imagens/Carrosel-img/Slide-Mobile-3.jpg" alt="Slide 1">
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
      <div id="seta-esquerda"><img onclick="voltar()" src="./Imagens/seta-esquerda.svg" alt=""></div>
      <div id="seta-direita"><img onclick="avancar()" src="./Imagens/seta-direita.svg" alt=""></div>
    </div>
    <div id="text-carrosel">
      <h1>Lorem ipsum is simply dummy text of the printing.</h1>
      <p>Lorem ipsum is simply dummy text of the printing Lorem ipsum is simply dummy text of Lorem Ipsun</p>
      <button id="btn-saiba-mais" type="button">Saiba Mais</button>
    </div> 

  </div>
  
  <div id="triangulo"></div>
</section>

<div id="modalidades">
    
  <div id="titulo">
    <h1>Nossas Modalidades</h1>
  </div>

  <div id="blocos">

  <div id="bloco1">
  <img class="image-placeholder" src="./Imagens/power-soccer.png">
    <div class="vertical-line"></div>
    <div class="content">
        <h2>Power Soccer <img id="icon-card" src="./Imagens/icon-player.png" alt="">   </h2>
        <div class="divider"></div>
        <p>Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of Lorem Ipsum Lorem Ipsum is</p>
    </div>
  </div>

  <div id="bloco2">
  <img class="image-placeholder" src="./Imagens/futebol-de-5.jpeg">
    <div class="vertical-line"></div>
    <div class="content">
        <h2>Futebol de 5 <img id="icon-card" src="./Imagens/icon-mask.png" alt="">   </h2>
        <div class="divider"></div>
        <p>Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of Lorem Ipsum Lorem Ipsum is</p>
    </div>
  </div>

  <div id="bloco3">
  <img class="image-placeholder" src="./Imagens/walking-football.jpg">
    <div class="vertical-line"></div>
    <div class="content">
        <h2>walking Football <img id="icon-card" src="./Imagens/icon-person.png" alt="">   </h2>
        <div class="divider"></div>
        <p>Lorem Ipsum is simply dummy text of the printing Lorem Ipsum is simply dummy text of Lorem Ipsum Lorem Ipsum is</p>
    </div>
  </div>
</div>

</div>

  <div id="content-info">
    <div id="curva"></div>

    <div id="texto-info">

    <div id="text-1">
      <h1>Qual o impacto do esporte em nossas vidas?</h1>
      <p>Drauzio Varella é médico cancerologista e escritor. Foi um dos pioneiros no tratamento da aids no Brasil. Entre seus livros de maior sucesso estão Estação Carandiru, Por um Fio e O Médico Doente</p>
    </div>

    <div id="block-text1">
      <div><img src="./Imagens/strong.png" alt=""></div>
      <div>
        <h1>Saúde Física</h1>
        <p>Esportes ajudam a fortalecer os músculos, melhorar a resistência cardiovascular, aumentar a flexibilidade e manter um peso saudável.</p>
      </div>
    </div>

    <div id="block-text2">
      <div><img src="./Imagens/calm.png" alt=""></div>
      <div>
        <h1>Saúde Mental</h1>
        <p> Atividades físicas liberam endorfinas, que são hormônios responsáveis pela sensação de bem-estar.</p>
      </div>
    </div>

    <div id="block-text3">
      <div><img src="./Imagens/community.png" alt=""></div>
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

    
    <div id="avaliacoes">

      <div id="comentario">
        <h1>Avaliações</h1>
        <p id="comentario-perfil">"Queria compartilhar minha experiencia incrivel com a instituição de futebol inclusivo. desde que comecei a participar, me senti parte de uma familia. A equipe é super acolhedora e os treinos são adaptados para todos, o que faz toda a diferença"</p>
      </div><br>


     <div id="estrelas">
        <img src="./Imagens/Perfil-img/estrelas.png" alt="">
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




 