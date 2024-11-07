<?php

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links


require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/professorcontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/turmacontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/modalidadecontroller.php';


$imports = [
  "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
  "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
  "https://fonts.gstatic.com/",
  "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Meu Perfil | Professor';
$pageCSS = ["perfilProfessor.css"];
$pageJS = ["perfilAluno.js"];

include_once('./templetes/menu.php');

$id = 5;
$professorController = new ProfessorController;
$professor = $professorController->buscarPorId($id);


$modalidadeController = new ModalidadeController;
$modalidade;

?>

<div class="container">
  <div id="perfil">


    <form id="form" action="">
      <h1 id="titulo">Bem Vindo(a)!</h1>
      <div id="informacoes">


        <div id="bloco1">

          <label for="input-matricula">Matricula</label>
          <input id="input-matricula" type="text" name="matricula" value="<?= $professor['id']; ?>" disabled>

          <label for="input-nome">Nome</label>
          <input id="input-nome" type="text" name="nome" value="<?= $professor['nome_professor']; ?>" disabled>

          <div id="modalidade-turma">
            <div id="modalidade">
              <label for="input-modalidade">Modalidade</label>
              <select id="select">
                <option value="" disabled selected hidden></option>
                <option>Modalidade 1</option>
                <option>Modalidade 2</option>
                <option>Modalidade 3</option>
                <option>Modalidade 4</option>
              </select>
            </div>

            <div id="turma">
              <label for="input-turma">Turma</label>
              <select id="select">
                <option value="" disabled selected hidden></option>
                <?php
                $turmaController = new TurmaController;
                $id_turmas = $turmaController->buscarProfessor($id);
                print_r($id_turmas);

                foreach ($id_turmas as $id_turma) { ?>

                  <?php $turma = $turmaController->buscarPorId($id_turma);

                  ?>
                  <option>Turma <?= $turma['nome_turma'] ?></option>

                <?php $turma = 0;
                } ?>

              </select>
            </div>


          </div>

          <label for="input-professor">Cordenador Correspondente</label>
          <input id="input-professor" type="text" disabled>

          <label for="input-email">E-mail</label>
          <input id="input-email" type="text" value="<?= $professor['email_professor']; ?>">

          <label for="input-senha">Senha</label>
          <input id="input-senha" type="text" value="<?= $professor['senha']; ?>">

          <button id="btn-enviar" type="submit">Editar Dados</button>
        </div>

        <div id="bloco2">
          <div id="foto-perfil">
            <button type="button" onclick="file()" id="btn-editar-foto"> <img src="./Imagens/editar.png" alt=""> </button>
            <input id="input-file" style="display: none;" type="file" name="foto">
          </div>

        </div>
      </div>
    </form>
  </div>

  <br><br><br><br><br>

</div>





<?php
include_once('./templetes/footer.php');
?>