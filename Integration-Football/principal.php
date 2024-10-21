<?php 

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
  $imports =[
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
  ];
  $titulo = 'Login';
  $pageCSS = ["principal.css"];
  $pageJS = ["principal.js"];

  include_once('./templetes/menu.php');

?>



<div class="container">
<div id="conteudo">
    <form id="form" action="">

        <div id="pricipal-calendario">
            <div id="header-calendario">
                <h1 id="mes-ano">JANEIRO 2024</h1>
                <div id="btns">
                    <img src="./Imagens/seta-esquerda-black.svg" alt="" id="prev">
                    <img src="./Imagens/seta-direita-black.svg" alt="" id="next">
                </div>
            </div><br>

            <div id="dia-semana">

            <div id="semanas">
                <p>Domingo</p>
                <p>Segunda</p>
                <p>Terça</p>
                <p>Quarta</p>
                <p>Quinta</p>
                <p>Sexta</p>
                <p>Sabádo</p>

            </div>

            <div id="dias">
                
               

                </div>
            </div>

        </div>


        <br><br><br><br><br><br><br><br><br><br><br>


        <h1 id="titulo">ATIVIDADES</h1>

    

    </form>
    
  </div>
</div>





<?php 
  include_once('./templetes/footer.php');
?>




 