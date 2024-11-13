<?php
// Os imports são usados para adicionar links de fontes e bibliotecas externas no HTML
$imports = [
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", // Importando ícones do Font Awesome
  "https://fonts.gstatic.com/", // Link necessário para funcionar fontes do Google
  "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"

];
// Variáveis que armazenam o título da página, os arquivos CSS e JS específicos da página
$titulo = 'Sobre Nós'; // Título da página
$pageJS = ["index.js"]; // Arquivo JS específico da página
$pageCSS = ["sobreNos.css"]; // Arquivo CSS dos Cards

// Inclui o arquivo index.php que contém a estrutura base da página
include_once('./templetes/menu.php');
?>

<div class="container">
    <div class="primeira-parte">
    <div class="titulo">
    <h1>Quem somos nós?</h1>
  <div class="titulo-correr"> </div>
  </div>
    <div class="imagem">   
    <img src="./Imagens/Sobre_Nos/icon.jpeg" alt="Icon">

</div>

<div class="texto">
      <p>A Escola de Futebol Beneficente foi criada com o objetivo de proporcionar a todas as pessoas consideradas frágeis, incapazes e vulneráveis um espaço para se divertirem, se cuidar e explorarem sua paixão pelo esporte.
      <br>&nbsp&nbspSabe-se que todo cidadão possui o direito ao lazer e a cultura, sendo nacionalmente determinado pela Constituição Federal de 1988, nos artigos 6° e 215, e mundialmente reconhecido através de alguns artigos, como o 24, da Declaração Universal dos Direitos Humanos (DUDH). Contudo, sabe-se ainda mais que os cumprimentos desses direitos é algo quase irreal na sociedade atual, principalmente se referindo àqueles vistos como frágeis e incapazes ao olho público.
      <br>&nbsp&nbspEntão com a determinação de exercer os nossos deveres de cidadãos, criamos a "Escola de Futebol Beneficente"! Um lugar que cuida destas pessoas, traz novas perspectivas em suas vidas e garante experiências repletas de cultura e diversão, fazemos tudo isso aproveitando ao máximo cada espaço esportivo comunitário, transformando-o e adaptando-o em uma plataforma inclusiva e sustentável de impacto social.</p>
  </div>


  <div class="fundo-azul">
  <div class="curva"></div>

    <div class="video">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/hGKAaVoDlSs?si=AiUXe9yrC6MJdJoJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</div>
  </div>

  <div class="titulo">
    <h1>O que fazemos?</h1> </div>

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

     <div class="texto1">

     <p>O projeto tem por objetivo integrar mulheres, pessoas da periferia e pessoas portadoras de deficiência, seja ela qual for, no âmbito esportivo, cultivando os seus direitos e reconhecimento como cidadãos, do mesmo modo zelando pelo bem estar mental e físico de nossos alunos.
      <br>&nbsp &nbspO esporte, assim como outras formas de arte como música e dança, é um terreno comum para a humanidade. Sua magia nos conecta e sua simplicidade o torna um poderoso fator de mudança social. Os espaços onde praticamos esportes são onde nos conectamos com nós mesmos, com os outros e com o mundo ao nosso redor. Eles nos proporcionam presentes valiosos, como comunidade, amizade, saúde e lições de vida, que são essenciais para uma vida positiva e produtiva.
      <br>&nbsp&nbspNada mais interessante do que juntar o útil ao agradável, não é mesmo? Ao se falar de esporte e cultura acreditamos que certamente vem uma única palavra na sua mente: "Futebol!". Acertei? Pois, bem utilizamos da nossa cultura esportiva mais rica e pura para atingir a nossa missão. Modificamos os espaços e materiais para que estas classes possam ter a mesma experiência tal qual estar jogando em um campo de futebol profissional.
      <br>&nbsp&nbspCom o desejo de ajudar ainda mais, possuímos um sistema de doações e arrecadações de alimentos e roupas para comunidades e pessoas necessitadas hospedado em nosso site!</p>
  </div>

  <div class= "ultima-parte">

  <div class="our-team-heading">CONTAMOS COM CERCA DE:</div>
    <div class="projects-container">
      <div class="project">
        <div class="project-name">PROFESSORES</div>
        <div class="project-number odometer websites-designed">10</div>
      </div>

      <div class="project">
        <div class="project-name">UNIDADES</div>
        <div class="project-number odometer apps-developed">3</div>
      </div>
    </div>
    </div>

 <div class="text-inscrever">
      <h1>SE INTERESSOU? NÃO PERCA TEMPO E SE INSCREVA.</h1>
      <button id="btn-saiba-mais" type="button">INSCREVA-SE</button>
  </div>
    </div>


    </div>
</div>

<?php
// Inclui o arquivo do rodapé (footer.php)
include_once('./templetes/footer.php');
?>
