<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/config/globals.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/controller/alunocontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/controller/professorcontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/controller/turmacontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/controller/justificativacontroller.php';


//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
$imports = [
  "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
  "https://fonts.gstatic.com/",
  "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Consulta';
$pageCSS = ["consulta.css"];
$pageJS = ["consulta.js"];


$id = $_SESSION["id"];

$alunocontroller = new alunocontroller();
$aluno = $alunocontroller->buscarPorId($id);

include_once('./templetes/headerAluno.php');
?>



<div class="container">
  <div id="consulta">


    <form id="form" action="controller/justificativacontroller.php" enctype="multipart/form-data" method="POST">
      <h1 id="titulo">JUSTIFICAR FALTAS</h1>

      <p>Escolha o(a) professor(a)</p>

      <?php
      $alunocontroller = new AlunoController();
      $professores = $alunocontroller->buscarProfessores($id);

      ?>
      <select required name="professor" id="select-professor" onChange="enviarModalidade()" name="id_professor">
        <option value="" disabled selected hidden>Escolha o(a) professor(a)</option>
        <?php
        $i = 0;
        foreach ($professores as $professor) {
          $i++;
          echo "<option id='" . $i . "' value='" . $professor['id'] . "'>" . htmlspecialchars($professor['nome_professor']) . "</option>";
        }
        ?>
      </select>

      <p>Defina a data de ausência:</p>
      <input id="input-data" type="date" name="data_falta" required>

      <p>Justificativa:</p>
      <textarea name="descricao" id="input-justificativa" placeholder="Escreva uma justificatica de até 255 caracteres."></textarea>

      <p>Anexar arquivo <span>(.pdf, .png, .jpeg, .jpg)</span></p>

      <div class="opcoes-arquivos">
        <input type="text" id="file-text" for="input-arquivo" placeholder="Nenhum arquivo selecionado" disabled>

        <div id="cancelar" class="visibilidade">
          <img src="Imagens/buttonCancel.svg" alt="" draggable="false">
        </div>
      </div>

      <div id="btns">
        <button id="input-arquivo" type="button">Escolher arquivo</button>
        <input id="files" type="file" name="arquivo_justificativa" required accept=".png,.jpg,.jpeg,.pdf">
        <input type="hidden" name="id_aluno" value=<?= $id ?>>
        <input type="hidden" name="aprovado_professor" value="">
        <input type="hidden" name="aprovado_instituicao" value="">
        <input type="hidden" class="form-control" name="crud" value="INSERT" disable>
        <button id="btn-enviar" type="submit">Enviar</button>
      </div>


    </form>

  </div>


  <br>



</div>





<?php
include_once('./templetes/footer.php');
?>
