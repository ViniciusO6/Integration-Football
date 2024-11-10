<?php 

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
  $imports =[
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
  ];
  $titulo = 'Consulta';
  $pageCSS = ["consulta.css"];
  $pageJS = ["consulta.js"];

  include_once('./templetes/headerAluno.php');

?>

<div class="container">
  <div id="consulta">
    

    <form id="form" action="">
        <h1 id="titulo">JUSTIFICAR FALTAS</h1>

        <p>Escolha o(a) professor(a)</p>
        <input id="input-professor" type="text">

        <p>Defina a data de ausência:</p>
        <input id="input-data" type="date">

        <p>Justificativa:</p>
        <textarea name="justiticativa" id="input-justificativa" placeholder="Escreva uma justificatica de até 255 caracteres."></textarea>
        
        <p>Atestado</p>
        <div id="btns">   
          <button id="input-arquivo" type="button">Escolher arquivo</button>
          <input id="files" type="file">
          <button id="btn-enviar" type="submit">Enviar</button>  
        </div>
        <label id="file-text" for="input-arquivo"></label>

    </form>
    
  </div>


  <br>


    
</div>





<?php 
  include_once('./templetes/footer.php');
?>




 