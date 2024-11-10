<?php

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
$imports = [
  "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
  "https://fonts.gstatic.com/",
  "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Consulta | Professor';
$pageCSS = ["consultaprofessor.css"];
$pageJS = ["consultarprofessor.js"];

include_once('./templetes/headerProfessor.php');

?>

<div class="container">
  <div id="consulta">


    <div id="conteudo">
      <form action="" class="Form1">
        <h1 id="titulo">ANÁLISE DE FALTAS</h1>

        <p>Verifique as justificativas de ausência dos alunos da instituição </p>

        <div class="Pesquisar">
          <div class="ComboBox">
            <p>Escolha a modalidade:</p>
            <select id="inserir_dados">
              <option value="" disabled selected hidden></option>
              <option>Modalidade 1</option>
              <option>Modalidade 2</option>
              <option>Modalidade 3</option>
              <option>Modalidade 4</option>
            </select>
          </div>

          <div class="ComboBox">
            <p>Escolha a turma:</p>
            <select id="inserir_dados">
              <option value="" disabled selected hidden></option>
              <option>Turma 1</option>
              <option>Turma 2</option>
              <option>Turma 3</option>
              <option>Turma 4</option>
            </select>
          </div>
        </div>


      </form>

      <div class="cards" onclick="AbrirJustificativa(this)">
        <div class="imagem">
          <img src="Imagens/FotoPerfil.svg" alt="" draggable="false">
        </div>

        <div class="informacao">
          <p>Cássio Egipcio Gomes</p>
          <p>26/02/2008</p>
        </div>

        <form action="" class="botoes">
          <!-- <div class="botoes"> -->
          <button id="aprovado" onclick="stopPropagationIfActive(event)" type="submit" value="Aprovado">
            <img src="Imagens/aprovar.svg" alt="" draggable="false">
          </button>

          <button id="reprovado" onclick="stopPropagationIfActive(event)" type="submit" value="Não Aprovado">
            <img src="Imagens/cancelar.svg" alt="" draggable="false">
          </button>
          <!-- </div> -->
        </form>
      </div>



      <div class="justificativa" id="card-justificativa">
        <div class="conteudo-justificativa" id="content-justificativa">
          <div class="titulo">
            <p>Justificativa:</p>
          </div>
          <p name="justiticativa" id="p-justificativa" disabled>"Este é um exemplo de texto que contém exatamente duzentos e cinquenta e cinco caracteres, incluindo espaços e pontuação. Ele foi gerado para demonstrar como atender a requisitos específicos de contagem de caracteres em diferentes contextos, como testes e aplicações educacionais."</p>

          <br>

          <div id="card-arquivo2" class="card-arquivo">
            <div class="arquivo">
              <div class="previa-arquivo">
                <img src="./Imagens/pdfIcon.png" alt="">
                <p>Arquivo 1- "Histotia do Power Soccer"</p>
              </div>
              <button>Baixar Arquivos</button>

            </div>
          </div>

        </div>
      </div>
    </div>

  </div>


  <br>



</div>





<?php
include_once('./templetes/footer.php');
?>