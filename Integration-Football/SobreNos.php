<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/SobreNos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap" rel="stylesheet"/>
    <link rel="icon" href="Imagens/icon.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.8/themes/odometer-theme-default.min.css"
  />
  <link rel="icon" href="Imagens/icon.jpeg" type="image/jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap" rel="stylesheet">
  
  
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

<!-- PLUG-IN LIBRAS-->
<div vw class="enabled">
  <div vw-access-button class="active"></div>
  <div vw-plugin-wrapper>
    <div class="vw-plugin-top-wrapper"></div>
  </div>
  </div>

   <!--TÍTULO E FOTO CENTRAL-->
   <div class="about-container">
      
    <div class="inicio">
      <p style="  font-family: Teko, sans-serif; font-weight: bold; justify-content: center; align-items:  center; font-size: 55px;">QUEM NÓS SOMOS?</p>
      <div class="pa"></div>
      <div class="profile-image">
        
        <img src="Imagens/icon.jpeg" title="Logo central." />
      </div>
    </div>
  
  <!--EXPLICAÇÕES E VÍDEO-->
    <div class="description">
      <p>&nbsp &nbsp &nbsp &nbspA Escola de Futebol Beneficente foi criada com o objetivo de proporcionar a todas as pessoas consideradas frágeis, incapazes e vulneráveis um espaço para se divertirem, se cuidar e explorarem sua paixão pelo esporte.</p>
      <p>&nbsp &nbsp &nbsp &nbspSabe-se que todo cidadão possui o direito ao lazer e a cultura, sendo nacionalmente determinado pela Constituição Federal de 1988, nos artigos 6° e 215, e mundialmente reconhecido através de alguns artigos, como o 24, da Declaração Universal dos Direitos Humanos (DUDH). Contudo, sabe-se ainda mais que os cumprimentos desses direitos é algo quase irreal na sociedade atual, principalmente se referindo àqueles vistos como frágeis e incapazes ao olho público.</p>
      <p>&nbsp &nbsp &nbsp &nbspEntão com a determinação de exercer os nossos deveres de cidadãos, criamos a "Escola de Futebol Beneficente"! Um lugar que cuida destas pessoas, traz novas perspectivas em suas vidas e garante experiências repletas de cultura e diversão, fazemos tudo isso aproveitando ao máximo cada espaço esportivo comunitário, transformando-o e adaptando-o em uma plataforma inclusiva e sustentável de impacto social.</p>
    </div>
    <iframe src="https://www.youtube.com/embed/hGKAaVoDlSs?si=B1yyAL6wTz6H2Op9"></iframe>

  <!--MODALIDADES-->  
    <h2 class="our-team-heading">O que fazemos?</h2>
    <div class="pa"></div>
    <br><br>
    <div class="our-team">
      <div class="team-member">
        <img src="Imagens/menin.jpeg" title="Crianças jogando bola." />
        <div class="designation">
          <strong>JOVENS MULHERES NO ESPORTE</strong>
        </div>
      </div>

      <div class="team-member">
        <img src="Imagens/bola.jpg" title="Crianças praticando atividades físicas." />
        <div class="designation">
          <strong>POWER SOCCER</strong>
        </div>
      </div>

      <div class="team-member">
        <img src="Imagens/time.png" title="Homens adultos jogando futebol adaptado." />
        <div class="designation">
          <strong>FUTEBOL DE 5</strong>
        </div>
      </div>
      
    </div>
    <div class="paragrafos">
      <br>
      <p>&nbsp &nbsp &nbsp &nbspO projeto tem por objetivo integrar mulheres, pessoas da periferia e pessoas portadoras de deficiência, seja ela qual for, no âmbito esportivo, cultivando os seus direitos e reconhecimento como cidadãos, do mesmo modo zelando pelo bem estar mental e físico de nossos alunos.</p>
      <p>&nbsp &nbsp &nbsp &nbspO esporte, assim como outras formas de arte como música e dança, é um terreno comum para a humanidade. Sua magia nos conecta e sua simplicidade o torna um poderoso fator de mudança social. Os espaços onde praticamos esportes são onde nos conectamos com nós mesmos, com os outros e com o mundo ao nosso redor. Eles nos proporcionam presentes valiosos, como comunidade, amizade, saúde e lições de vida, que são essenciais para uma vida positiva e produtiva.</p>
      <p>&nbsp &nbsp &nbsp &nbspNada mais interessante do que juntar o útil ao agradável, não é mesmo? Ao se falar de esporte e cultura acreditamos que certamente vem uma única palavra na sua mente: "Futebol!". Acertei? Pois, bem utilizamos da nossa cultura esportiva mais rica e pura para atingir a nossa missão. Modificamos os espaços e materiais para que estas classes possam ter a mesma experiência tal qual estar jogando em um campo de futebol profissional.</p>
      <p>&nbsp &nbsp &nbsp &nbsp Com o desejo de ajudar ainda mais, possuímos um sistema de doações e arrecadações de alimentos e roupas para comunidades e pessoas necessitadas hospedado em nosso site!</p>
    </div>
      
  
    <h2 class="our-team-heading">CONTAMOS COM CERCA DE:</h2>
    <div class="projects-container">
      <div class="project">
        <h3 class="project-name">PROFESSORES</h3>
        <div class="project-number odometer websites-designed">0</div>
      </div>

      <div class="project">
        <h3 class="project-name">UNIDADES</h3>
        <div class="project-number odometer apps-developed">0</div>
      </div>
    </div>
    <h2 class="final">SE INTERESSOU?  NÃO PERCA TEMPO E VENHA SE <a href="Cadastro.html"><font color="#f39200">INSCREVER</font></a>!</h2>

   
  </div>
    </div>



   <!--LINKS-->
   
    
   <script src="css/menu_bar.js"></script>
     <!--JAVA LIBRAS-->
     <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
     <script>
     new window.VLibras.Widget('https://vlibras.gov.br/app');
     </script>
  </body>
  <?php 
  include_once('./templetes/footer.php');
?>