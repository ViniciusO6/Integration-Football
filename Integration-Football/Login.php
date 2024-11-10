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
  $pageCSS = ["Login.css"];
  $pageJS = ["Login.js"];

  include_once('./templetes/index.php');

?>



 

<div class="container">
      

    <div class="entrada">
      <img src="imagens/noun-account-5154619.png" alt="imagem Login" />
      <br/>
      <p>E-mail <span>*</span></p>
      <input type="email" /><br /> 
      <p>Senha <span>*</span> </p>
      <input type="password" /><br />
      <a href="#">Esqueceu a senha? Redefine-a agora</a><br />
      <button><strong>Entrar</strong></button>
    </div>


  
</div>

<?php 

  include_once('./templetes/footer.php');

?>




 