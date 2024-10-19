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
  $pageCSS = ["Contato.css"];
  $pageJS = ["Login.js"];

  include_once('./templetes/menu.php');

  

?>
 <!--NAVBAR-->



<div class="content">

<!-- PLUG-IN LIBRAS-->
<div vw class="enabled">
  <div vw-access-button class="active"></div>
  <div vw-plugin-wrapper>
    <div class="vw-plugin-top-wrapper"></div>
  </div>
  </div>
  
  <!--TÍTULO-->
  <p class="bloco01">CONTATE-NOS</p>

  <!--CARDS-->
  <section class="contato">
    <div class="row">
      <div class="card orange" style="height: 200px;">
        <a href="Duvidas.html">
          <font color=black>
          <p>DÚVIDAS</p>
          <p>FEEDBACKS</p>
          <img class="image" src="Imagens/noun-feedback-5289654.png" alt="money" />
            </font>
        </a>
      </div>
      <div class="card blue">
        <a href="Patrocinio.html">
          <font color=black>
          <p>SEJA UM</p>
          <p>PATROCINADOR</p>
          <img class="image" src="Imagens/noun-teamwork-3995328.png" alt="settings" />
          </font>
        </a>
      </div>
      <div class="card orange">
        <a href="Doacoes.html">
          <font color=black>
          <p>DOAÇÕES</p>
          <p>CONTRIBUIÇÕES</p>
          <img class="image" src="Imagens/noun-donations-6165623.png" alt="article" />
          </font>
        </a>
      </div>
    </div>
   
  </section>
</div>
  <!--FOOTER-->
  <br><br>
  <footer>
    <div class="container-footer">
        <div class="row-footer">
            <!-- footer col-->
            <div class="footer-col">
                <h4>SOBRE A INSTITUIÇÃO</h4>
                <ul>
                    <li><a href="#"> Quem somos </a></li>
                    <li><a href=""> Nossos Projetos e serviços </a></li>
                    <li><a href=""> Política de Privacidade </a></li>
                    <li><a href=""> Programa de Afiliados</a></li>
                </ul>
            </div>
            <!--end footer col-->
            <!-- footer col-->
            <div class="footer-col">
                <h4>FALE CONOSCO</h4>
                <ul>
                    <li><a href="#"></a></li>
                    <li><a href="#">(11) 94349-4679</a></li>
                    <li><a href="#">(11) 4002-8922</a></li>
                    <li><a href="#">integrationfuteb@gmail.com</a></li>
                    
                </ul>
            </div>
            <!--end footer col-->
            <!-- footer col-->
           
            <!--end footer col-->
            <!-- footer col-->
            <div class="footer-col">
                <h4>Se subescreva!</h4>
                <div class="form-sub">
                    <form>
                        <input type="email" placeholder="Digite o seu e-mail" required>
                        <button>Subscrever</button>
                    </form>
                </div>

                <div class="medias-socias">
                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                    <a href="#"> <i class="fa fa-instagram"></i> </a>
                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                    <a href="#"> <i class="fa fa-linkedin"></i> </a>
                </div>

            </div>
            <!--end footer col-->
        </div>
    </div>
    <div class="direitos">
      <p><strong>1° Desenvolvimento de Sistemas - AMS (ETEC ZONA LESTE). </strong> Todos os direitos reservados &copy; 2023</p>
    </div>
  </footer>

   <!--LINKS-->
   
    
   <script src="css/menu_bar.js"></script>
     <!--JAVA LIBRAS-->
     <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
     <script>
     new window.VLibras.Widget('https://vlibras.gov.br/app');
     </script>
  </body>
</html>