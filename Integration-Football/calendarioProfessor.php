<?php

require_once './controller/professorcontroller.php';
require_once './controller/alunocontroller.php';
require_once './controller/turmacontroller.php';
require_once './controller/atividadecontroller.php';

$imports = [
  "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
  "https://fonts.gstatic.com/",
  "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Calendário | Professor';
$pageCSS = ["calendarioProfessor.css"];
$pageJS = ["calendarioProfessor.js"];

include_once('./templetes/headerProfessor.php');

$idprofessor = 5;
$idaluno = 4;

$professorcontroller = new ProfessorController();
$professor = $professorcontroller->buscarPorId($idprofessor);

$alunocontroller = new AlunoController();
$aluno = $alunocontroller->buscarPorId($idaluno);

$turmacontroller = new TurmaController();
$turma = $turmacontroller->buscarPorId($aluno['id_turma']);

$atividadecontroller = new AtividadeController();
$atividades = $atividadecontroller->buscarAtividades($turma['id_turma']);

?>

<style>
  <?php
  foreach ($atividades as $atividade) {
    echo "
    .dia" . $atividade['data_entrega'] . " {
        border-color: #079b4e !important;
    }

    .evento" . $atividade['data_entrega'] . ".tooltip:hover .tooltip-text {
        visibility: visible;
        opacity: 1;
    }
    ";
  }
  ?>
</style>

<script>
  function carregarEventos() {
    setTimeout(function() {
      <?php
      foreach ($atividades as $atividade) {
        echo "document.getElementById('texto-evento" . $atividade['data_entrega'] . "').innerHTML = '" . $atividade['titulo_atividade'] . "';";
      }
      ?>
      console.log('Eventos carregados');
    }, 200);
  }

  document.addEventListener("DOMContentLoaded", carregarEventos);
</script>

<div class="container">
  <div id="conteudo">
    <div id="form">

      <div id="pricipal-calendario">
        <br>

        <div id="dia-semana">
          <div id="header-calendario">
            <h1 id="mes-ano">JANEIRO 2024</h1>
            <div id="btns">
              <img src="./Imagens/seta-esquerda-black.svg" alt="" id="prev">
              <img src="./Imagens/seta-direita-black.svg" alt="" id="next">
            </div>
          </div>
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

      <h1 id="titulo">ATRIBUIR ATIVIDADE</h1>

      <div id="atividade" class="atividade">
        <div id="card-atividade" class="card-atividade" onclick="abrirPrevia('atividade', 'card-arquivo')">
          <div class="bloco1">
            <div class="icone-atividade">
              <img src="./Imagens/AtividadeDefault.svg" alt="">
            </div>

          </div>

          <div class="bloco2">
            <div class="titulo-atividade">
              <h3>ADICIONAR ATIVIDADE</h3>
            </div>

            <div class="data-entrega">
              <img src="./Imagens/Time-Circle.png" alt="">
              <p>Sem horário</p>
            </div>
          </div>
        </div>

        <div id="card-arquivo" class="card-arquivo fechado">
          <div class="arquivo">
            <form action="controller/atividadecontroller.php" method="POST" name="formulario">
              <div class="previa-arquivo">

                <div class="titulos">
                  <p>Título do Evento:</p>
                  <p>Data do Evento:</p>
                  <p>Horário de Inicio:</p>
                  <p>Horário de Término:</p>
                  <p>Anexar Arquivos:</p>

                </div>

                <div class="inputs">
                  <input type="text" name="titulo_atividade" required>
                  <input type="date" name="data_entrega" id="data_entrega" required>
                  <input type="time" name="hora_inicio" required>
                  <input type="time" name="hora_termino" required>

                  <div class="opcoes-arquivos">
                    <input type="text" id="file-text" for="input-arquivo" placeholder="Nenhum arquivo selecionado" disabled>

                    <div id="cancelar">
                      <img src="Imagens/buttonCancel.svg" alt="" draggable="false">
                    </div>
                  </div>

                  <input id="files" type="file" name="caminho_arquivo" value="">

                  <input type="hidden" name="id_professor" value="5">
                  <input type="hidden" name="id_turma" value="1">
                  <input type="hidden" class="form-control" name="crud" value="INSERT" disable>
                </div>

              </div>
              <div class="botoes">
                <button id="input-arquivo" type="button" required>Escolher arquivo</button>
                <button type="submit" id="publicar">Publicar Evento</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <h1 id="titulo-tarefas">ATIVIDADES ATRIBUIDAS</h1>

      <?php
      $numeroAtividade = 1;
      foreach ($atividades as $atividade) {
        $numeroAtividade++;

      ?>

        <div id="tarefa<?= $numeroAtividade ?>" class="tarefa-item">
          <div id="cartao-tarefa" class="cartao-tarefa" onclick="abrirPrevia('tarefa<?= $numeroAtividade ?>', 'cartao-arquivo<?= $numeroAtividade ?>')">
            <div class="bloco-um">
              <div class="icone-tarefa">
                <img src="./Imagens/checklist.png" alt="">
              </div>
            </div>

            <div class="bloco-dois">
              <div class="titulo-tarefa">
                <h3><?= $atividade['titulo_atividade'] ?></h3>
              </div>

              <div class="data-entrega">
                <img src="./Imagens/Time-Circle.png" alt="">
                <p>
                  <?= $horaInicio = substr($atividade['hora_inicio'], 0, -6); ?>h
                  <?= $minutosInicio = substr($atividade['hora_inicio'], 3, -3); ?> às
                  <?= $horaTermino = substr($atividade['hora_termino'], 0, -6); ?>h
                  <?= $minutosTermino = substr($atividade['hora_termino'], 3, -3); ?>
                </p>
              </div>
            </div>

            <div class="bloco-tres">
              <img src="./Imagens/arrow.png" alt="">
              <h3>DATA: <?php
                        $data = $atividade['data_entrega'];
                        $data = explode('-', $data);
                        $dataFormatada = $data[2] . '/' . $data[1];
                        echo $dataFormatada;
                        ?></h3>
            </div>
          </div>

          <div id="cartao-arquivo<?= $numeroAtividade ?>" class="cartao-arquivo fechado">
            <div class="arquivo-conteudo">
              <div class="previa-arquivo">
                <img src="./Imagens/pdfIcon.png" alt="">
                <p>Arquivo 1 - "História do Power Soccer"</p>
              </div>

              <div class="botoes-atividade">
                <div class="deletar" onclick="deletar(this)">
                  <img src="./Imagens/delete.svg" id="id-Card" alt="" style="cursor: pointer;">

                  <input type="hidden" class="form-control" name="id" id="id-atividade" value="<?= $atividade['id_atividade'] ?>" disable>
                </div>

                <button style="cursor: pointer;" id="baixar atividade" type="button" onclick="redirecionar('./download.php?file=exemplo.pdf')">Baixar Arquivos</button>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>


      <div id="tela-deletar" class="invisivel">
        <p id="titulo-deletar">Tem certeza que deseja deletar a atividade?</p>
        <img src="./Imagens/Icone-Deletar.svg" alt="">
        <p id="descricao-deletar">Uma vez que confirmar, não será possível restaurar a atividade e suas informações. Deseja mesmo deletar?</p>
        <form action="./controller/atividadecontroller.php" id="formulario-deletar" method="POST">
          <input type="submit" value="Sim" id="confirmar">
          <input type="hidden" class="form-control" name="id" id="id" value="" disable>
          <input type="hidden" class="form-control" name="crud" value="DELETE" disable>
          <input type="button" value="Cancelar" id="Sair" onclick="ficaInvisivel()">
        </form>
      </div>

    </div> <!-- fim do form -->



  </div>
  <div id="sombra" class="invisivel"></div>
</div>

<style>
  .tooltip {
    position: relative;
    display: inline-block;
    cursor: pointer;
  }

  .tooltip-text {
    visibility: hidden;
    font-size: 12px;
    width: 150px;
    background-color: black;
    color: white;
    text-align: center;
    border-radius: 5px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    top: -5px;
    left: 110%;
    opacity: 0;
    transition: opacity 0.3s;
  }

  .tooltip:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
  }
</style>



<?php
include_once('./templetes/footer.php');
?>