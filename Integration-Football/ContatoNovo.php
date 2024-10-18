<?php 

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
  $imports =[
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"

  ];
  $titulo = 'Contato';
  $pageCSS = ["ContatoNovo.css"];
  $pageJS = ["Login.js"];

  include_once('./templetes/index.php');

?>



<div class="container">
    
    <div class="conteudo">
      <h1>Fale Conosco</h1>
        <div class="opçoes">
            <div class="contato card">
                <img src="Imagens/Email.svg" alt="">
                <p class="titulo">+ Contatos</p>
                <p class="descricao">Integrationfootball.central@gmail.com</p>
            </div>

            <div class="matricula card">
                <img src="Imagens/Fone.svg" alt="">
                <p class="titulo">Central de Matrícula</p>
                <p class="descricao">(11)99999-9999</p>
                <p class="descricao">(11)99999-9999</p>
            </div>

            <div class="unidades card">
                <img src="Imagens/Unidades.svg" alt="">
                <p class="titulo">Mapa de Unidades</p>
                <p class="descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>


</div>





<?php 
  include_once('./templetes/footer.php');
?>




 