<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/turmacontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/alunocontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/justificativacontroller.php';
$turmacontroller = new TurmaController();
$alunocontroller = new AlunoController();
$id_professor = 5;
$i = 0;

if (isset($_POST['tipo']) && $_POST['tipo'] == "filtrar" && isset($_POST['modalidade']) && isset($_POST['turma'])) {
    $modalidade = $_POST['modalidade'];
    $turma = $_POST['turma'];

    $alunos = $alunocontroller->listarAlunosPorTurma($turma);

    foreach ($alunos as $aluno) {
        echo '
        <div id="tr-nome">
            <p> ' . $aluno['nome_aluno'] . '</p>
            <div class="separador-horizontal"></div>
        </div>
        ';
    }
} else if (isset($_POST['tipo']) && $_POST['tipo'] == "buscarTurmas" && isset($_POST['modalidade'])) {
    $modalidade = $_POST['modalidade'];
    $turmas = $turmacontroller->buscarPorModalidade($modalidade, $id_professor);
    echo '<option value="" disabled selected hidden>Escolha uma turma</option>';

    foreach ($turmas as $turma) {
        $i++;
        echo "<option id='turma-" . $i . "' value='" . $turma['id_turma'] . "'>Turma " . htmlspecialchars($turma['nome_turma']) . "</option>";
    }
} else if (isset($_POST['tipo']) && $_POST['tipo'] == "carregarEmail") {
    $modalidade = $_POST['modalidade'];
    $turma = $_POST['turma'];

    $alunos = $alunocontroller->listarAlunosPorTurma($turma);

    foreach ($alunos as $aluno) {
        echo '
        <div id="tr-nome">
            <p> ' . $aluno['email_aluno'] . '</p>
            <div class="separador-horizontal"></div>
        </div>
        ';
    }
} else if (isset($_POST['tipo']) && $_POST['tipo'] == "carregarNomeTurma") {
    $turma = $_POST['turma'];
    $turmas = $turmacontroller->buscarPorId($_POST['turma']);
    $alunos = $alunocontroller->listarAlunosPorTurma($turma);

    foreach ($alunos as $aluno) {
        echo
        '
        <div id="tr-nome">
             <p>Turma ' . $turmas['nome_turma'] . '</p>
            <div class="separador-horizontal"></div>
        </div>
                    
        ';
    }
} else if (isset($_POST['tipo']) && $_POST['tipo'] == "carregarChamada") {
    $modalidade = $_POST['modalidade'];
    $turma = $_POST['turma'];
    $i = 0;
    $alunos = $alunocontroller->listarAlunosPorTurma($turma);
    if (empty($alunos)){
    echo 'Nenhuma turma selecionada';

    }else{
        echo '
        
        <div id="th-chamada">

            <div id="titulo-nome">
                <p>Nome</p>
            </div>
            
            <div id="presente-ausente">

                <div class="separador-vertical"></div>

                <div id="presente">
                    <p>Presente</p>
                </div>

                <div class="separador-vertical"></div>

                <div id="ausente">
                    <p>Ausente</p>
                </div>
            </div>
            
        </div>
        <!-- Fim do Cabeçalho da tabela -->
        ';
        
        foreach ($alunos as $aluno) {
            
            $i++;
            echo '
                    <!-- Linha de nome e Checbox presença -->
                    <div id="nomes-alunos">
                        <div id="tr-nome">
                            <p>'. $aluno['nome_aluno'] .'</p>
                            <div class="separador-horizontal"></div>
                        </div>

                        <div class="separador-vertical"></div>

                        <div id="presenca-select">
                            <input value="1" name="presenca['. $aluno['id_aluno'].']" value="'. $aluno['id_aluno'] .'" type="checkbox" class="input-checkbox" onclick="selectOnlyThis(this, \'presenca['. $aluno['id_aluno'] .']\')">

                            <div class="separador-vertical"></div>

                            <input value="0" name="presenca['. $aluno['id_aluno'].']" type="checkbox" class="input-checkbox" onclick="selectOnlyThis(this, \'presenca['. $aluno['id_aluno'] .']\')"> 
                            <input name="id_turma" type="hidden" value="'. $aluno['id_turma'].'">
                        </div>
                    </div>
            ';
        }
}


}else if(isset($_POST['tipo']) && $_POST['tipo'] == "ValidarChamada"){
    if (isset($_POST['presenca']) && is_array($_POST['presenca'])) {
        
    }else{
        $message = new Message($_SERVER['DOCUMENT_ROOT']);
        $message->setMessage("Nenhum dado de presença recbido", "error", "back");
    }
}else if ((isset($_POST['tipo']) && $_POST['tipo'] == "filtrarJustificativa")){


    $justificativacontroller = new JustificativaController();
    $justificativas = $justificativacontroller->FiltrarPorTurma($_POST['id_turma']);
    $numeroAtividade = 1;
    if(!empty($justificativas)){

   



    foreach ($justificativas as $justificativa) {
        $numeroAtividade++;

        $data = $justificativa['data_aula'];
        $data = explode('-', $data);
        $dataFormatada = $data[2] . '/' . $data[1] . '/' . $data[0];

        echo '
        <div class="cards" onclick="AbrirJustificativa(this)">
          <div class="imagem">
            <img src="Imagens/FotoPerfil.svg" alt="" draggable="false">
          </div>

          <div class="informacao">
            <p>' . $justificativa['nome_aluno'] . '</p>
            <p>Aula: ' . $dataFormatada . '</p>
          </div>

          <form action="./controller/justificativacontroller.php" class="botoes" method="POST">
            <button name="aprovado" id="aprovado" onclick="stopPropagationIfActive(event)" type="submit" value="1">
              <img src="Imagens/aprovar.svg" alt="" draggable="false">
            </button>

            <button name="aprovado" id="reprovado" onclick="stopPropagationIfActive(event)" type="submit" value="0">
              <img src="Imagens/cancelar.svg" alt="" draggable="false">
            </button>
            <input name="crud" type="hidden" value="enviarResposta">
            <input name="id_justificativa" type="hidden" value="' . $justificativa['id_justificativa'] . '">
          </form>
        </div>

        <div class="justificativa" id="card-justificativa">
          <div class="conteudo-justificativa" id="content-justificativa">
            <div class="titulo">
              <p>Justificativa:</p>
            </div>
            <p name="justiticativa" id="p-justificativa" disabled>' . $justificativa['descricao'] . '</p>

            <br>

            <div id="card-arquivo2" class="card-arquivo">
              <div class="arquivo">
                <div class="previa-arquivo">
                  <img src="./Imagens/pdfIcon.png" alt="">
                  <p>Arquivo 1- "História do Power Soccer"</p>
                </div>
                <button>Baixar Arquivos</button>
              </div>
            </div>

          </div>
        </div>
        ';
    }
     }else{
        echo "Nenhuma justificativa encontrada nesta turma";
     }

}else if((isset($_POST['tipo']) && $_POST['tipo'] == "JustificativasSemFiltro")){

    $justificativacontroller = new JustificativaController();
      $justificativas = $justificativacontroller->listarJustificativasProfessor($_POST['id_professor']);
    $numeroAtividade = 1;
    if(!empty($justificativas)){

   



    foreach ($justificativas as $justificativa) {
        $numeroAtividade++;

        $data = $justificativa['data_aula'];
        $data = explode('-', $data);
        $dataFormatada = $data[2] . '/' . $data[1] . '/' . $data[0];

        echo '
        <div class="cards" onclick="AbrirJustificativa(this)">
          <div class="imagem">
            <img src="Imagens/FotoPerfil.svg" alt="" draggable="false">
          </div>

          <div class="informacao">
            <p>' . $justificativa['nome_aluno'] . '</p>
            <p>Aula: ' . $dataFormatada . '</p>
          </div>

          <form action="./controller/justificativacontroller.php" class="botoes" method="POST">
            <button name="aprovado" id="aprovado" onclick="stopPropagationIfActive(event)" type="submit" value="1">
              <img src="Imagens/aprovar.svg" alt="" draggable="false">
            </button>

            <button name="aprovado" id="reprovado" onclick="stopPropagationIfActive(event)" type="submit" value="0">
              <img src="Imagens/cancelar.svg" alt="" draggable="false">
            </button>
            <input name="crud" type="hidden" value="enviarResposta">
            <input name="id_justificativa" type="hidden" value="' . $justificativa['id_justificativa'] . '">
          </form>
        </div>

        <div class="justificativa" id="card-justificativa">
          <div class="conteudo-justificativa" id="content-justificativa">
            <div class="titulo">
              <p>Justificativa:</p>
            </div>
            <p name="justiticativa" id="p-justificativa" disabled>' . $justificativa['descricao'] . '</p>

            <br>

            <div id="card-arquivo2" class="card-arquivo">
              <div class="arquivo">
                <div class="previa-arquivo">
                  <img src="./Imagens/pdfIcon.png" alt="">
                  <p>Arquivo 1- "História do Power Soccer"</p>
                </div>
                <button>Baixar Arquivos</button>
              </div>
            </div>

          </div>
        </div>
        ';
    }
     }else{
        echo "Nenhuma justificativa encontrada nesta turma";
     }

}

