<?php

require_once './controller/alunocontroller.php';
require_once './controller/professorcontroller.php';
require_once './controller/turmacontroller.php';
require_once './controller/modalidadecontroller.php';
require_once './controller/justificativacontroller.php';



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

$id = $_SESSION["id"];
$idModalidade;

$professorController = new ProfessorController;
$professor = $professorController->buscarPorId($id);

include_once('./templetes/headerProfessor.php');



?>

<script>

function CarregarJustificativasSemFiltro(){
  console.log("chamou");
    let id_professor = document.getElementById("id_professor").value;
    let tipo = "JustificativasSemFiltro";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/ajax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("id_professor=" + id_professor  + "&tipo=" + tipo);


    xhr.onload = function() {
      if (xhr.status === 200) {
        document.getElementById("justificativa-card").innerHTML = xhr.responseText;
      }
    };
}

function filtrarJustificativas(){
  console.log("chamou");
    let id_turma = document.getElementById("select-turma").value;
    let tipo = "filtrarJustificativa";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/ajax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("id_turma=" + id_turma  + "&tipo=" + tipo);


    xhr.onload = function() {
      if (xhr.status === 200) {
        document.getElementById("justificativa-card").innerHTML = xhr.responseText;
      }
    };
}


  function enviarModalidade() {
    console.log("chamou");
    var modalidade = document.getElementById("select-modalidade").value;
    let tipo = "buscarTurmas";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/ajax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("modalidade=" + modalidade + "&tipo=" + tipo);


    xhr.onload = function() {
      if (xhr.status === 200) {
        document.getElementById("select-turma").innerHTML = xhr.responseText;
      }
    };
  }

  function filtrar() {
    let tipo = "filtrar";

    var modalidade = document.getElementById("select-modalidade").value;
    var turma = document.getElementById("select-turma").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/ajax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Envia o valor do select (modalidade) para o PHP
    xhr.send("modalidade=" + modalidade + "&turma=" + turma + "&tipo=" + tipo);

    xhr.onload = function() {
      if (xhr.status === 200) {
        document.getElementById("nomes-alunos").innerHTML = xhr.responseText;
      }
    };

    setTimeout(function() {
      tipo = "carregarEmail";

      var modalidade = document.getElementById("select-modalidade").value;
      var turma = document.getElementById("select-turma").value;

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "./ajax/ajax.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.send("modalidade=" + modalidade + "&turma=" + turma + "&tipo=" + tipo);

      xhr.onload = function() {
        if (xhr.status === 200) {
          document.getElementById("contato-alunos").innerHTML = xhr.responseText;
        }
      };

    }, 1)

    setTimeout(function() {
      let tipo = "carregarNomeTurma";

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "./ajax/ajax.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.send("modalidade=" + modalidade + "&turma=" + turma + "&tipo=" + tipo);

      xhr.onload = function() {
        if (xhr.status === 200) {
          document.getElementById("Turma").innerHTML = xhr.responseText;
        }
      };

    }, 1)


  }

  function carregarNomeTurma() {
    let tipo = "carregarNomeTurma";

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/ajax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("modalidade=" + modalidade + "&turma=" + turma + "&tipo=" + tipo);

    xhr.onload = function() {
      if (xhr.status === 200) {
        document.getElementById("Turma").innerHTML = xhr.responseText;
      }
    };
  }
</script>



<div class="container">
  <div id="conteudos">


    <div id="form">
      <form action="" class="Form1">
        <h1 id="titulo">ANÁLISE DE FALTAS</h1>

        <p>Verifique as justificativas de ausência dos alunos da instituição </p>

        <div id="form-filtro">
        <input id="id_professor" value="<?= $id  ?>" type="hidden">
          <!-- Div do ComboBox1  -->
          <div class="ComboBox">
            <p class="titulo">Escolha a modalidade:</p>
            <?php

            $modalidadecontroller = new modalidadecontroller();
            $modalidades = $modalidadecontroller->listarPorIdProfessor($id);
            ?>
            <select required name="modalidade" id="select-modalidade" onChange="enviarModalidade()">
              <option value="" disabled selected hidden>Escolha uma modalidade</option>
              <?php
              $i = 0;
              foreach ($modalidades as $modalidade) {
                $i++;
                echo "<option id='" . $i . "' value='" . $modalidade['id'] . "'>" . htmlspecialchars($modalidade['nome_modalidade']) . "</option>";
              }
              ?>
            </select>



          </div>
          <!-- Final ComboBox1-->



          <!-- Div do ComboBox2  -->
          <div class="ComboBox">
            <p class="titulo">Escolha a turma:</p>
            <select require name="turma" id="select-turma" onChange="">
              <option value="0" disabled selected hidden>Escolha uma turma</option>

            </select>
          </div>
          <!-- Final ComboBox2 -->

          <div class="buttons">
            <button onclick="filtrarJustificativas()" class="filtrar" type="button">Filtrar</button>
            <div id="cancelar">
              <img onclick="CarregarJustificativasSemFiltro()" src="Imagens/buttonCancel.svg" alt="" draggable="false">
            </div>
          </div>
        </div>
        <!-- Final Form-Filtro-->
      </form>

       <div id="justificativa-card">      
         
      <?php
      $justificativacontroller = new JustificativaController();
      $justificativas = $justificativacontroller->listarJustificativasProfessor($id);
      $numeroJustificativa = 0;

      foreach ($justificativas as $justificativa) {
        $numeroJustificativa++
      ?>

      
        <div class="cards" onclick="AbrirJustificativa(this, 'card-justificativa-<?= $numeroJustificativa ?>', 'content-justificativa-<?= $numeroJustificativa ?>' , 'aprovado-<?= $numeroJustificativa ?>' ,'reprovado-<?= $numeroJustificativa ?>')">
          <div class="imagem">
            <img src="Imagens/FotoPerfil.svg" alt="" draggable="false">
          </div>


          <div class="informacao">
            <p><?= $justificativa['nome_aluno'] ?></p>
            <p>Aula: <?php
                      $data = $justificativa['data_aula'];
                      $data = explode('-', $data);
                      $dataDormatada = $data[2] . '/' . $data[1] . '/' . $data[0];
                      ?>
              <?= $dataDormatada; ?></p>
          </div>

          <form action="./controller/justificativacontroller.php" class="botoes" method="POST">
            <!-- <div class="botoes"> -->
            <button name="aprovado" class="aprovado" id="aprovado-<?= $numeroJustificativa ?>" onclick="stopPropagationIfActive(event)" type="submit" value="1">
              <img src="Imagens/aprovar.svg" alt="" draggable="false">
            </button>

            <button name="aprovado" class="reprovado" id="reprovado-<?= $numeroJustificativa ?>" onclick="stopPropagationIfActive(event)" type="submit" value="0">
              <img src="Imagens/cancelar.svg" alt="" draggable="false">
            </button>
            <input name="crud" type="hidden" value="enviarResposta">
            <input name="id_justificativa" type="hidden" value="<?= $justificativa['id_justificativa'] ?>">
            <!-- </div> -->
          </form>
        </div>



        <div class="justificativa fechado" id="card-justificativa-<?= $numeroJustificativa ?>">
          <div class="conteudo-justificativa" id="content-justificativa-<?= $numeroJustificativa ?>">
            <div class="titulo">
              <p>Justificativa:</p>
            </div>
            <p name="justiticativa" id="p-justificativa" disabled><?= $justificativa['descricao'] ?></p>

            <br>

            <div id="card-arquivo2" class="card-arquivo">
              <div class="arquivo">
                <div class="previa-arquivo">
                  <img src="./Imagens/pdfIcon.png" alt="">
                  <p><?= $justificativa['nome_arquivo'] ?></p>
                </div>
                <button onclick="redirecionar('./Server_Service/download.php?file=<?= $justificativa['caminho_arquivo'] ?>&type=justificativa')">Baixar Arquivos</button>

              </div>
            </div>

          </div>
        </div>
      
      <?php } ?>
</div>


    </div>

  </div>


  <br>



</div>





<?php
include_once('./templetes/footer.php');
?>