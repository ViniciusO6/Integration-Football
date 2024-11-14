<?php 

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
  $imports =[
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  ];

  $titulo = 'Fale Conosco';
  $pageCSS = ["contatos.css"];
  $pageJS = ["Login.js"];

  include_once('./templetes/menu.php');

?>



<div class="container">
    <div class ="titulo"><h1>Fale Conosco</h1></div>
        <div class="conteudo">
            
                    <div class="opcoes">
                        
                            <div class="card largura" onclick="window.location.href='https://mail.google.com/mail/?view=cm&fs=1&to=integrationfootball.central@gmail.com';">
                                <div class="imagens">
                                    <img src="Imagens/Mensagem.svg" alt="" draggable="false"> 
                                </div>

                                <div class="texto">
                                    <h2>+ Contatos</h2>

                                        <div class="descricao">    
                                            <p>integrationfootball.central@gmail.com</p>
                                        </div>

                                </div>
                            </div>
                            <div class="card largura" onclick="window.location.href='https://web.whatsapp.com/';">

                            <div class="imagens">
                                <img src="Imagens/Telefone.svg" alt="" draggable="false">
                            </div>
                            <div class="texto">
                                <h2>Central de Matrículas</h2>

                                    <div class="descricao">   
                                        <p>(11)98753-8346</p>
                                        <p>(11)93244-5464</p>
                                    </div>

                            </div>
                        </div>
                        


                        <div class="card largura"  onclick="redirecionar('Unidades.php')">
                            <div class="imagens">
                                <img src="Imagens/Mapa.svg" alt="" draggable="false">
                            </div>
                            <div class="texto">
                                <h2>Mapa de Unidades</h2>

                            <div class="descricao">
                                <p>Localize a unidade mais próxima através do nosso mapa de unidades.</p>
                            </div>

                            </div>
                        </div>



                    </div>
            </div>


</div>





<?php 
  include_once('./templetes/footer.php');
?>




 
