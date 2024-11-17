<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/turmacontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/alunocontroller.php';

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
                            <input name="'. $i .'" value="'. $aluno['id_aluno'] .'" type="checkbox" class="input-checkbox" onclick="selectOnlyThis(this, '. $i .')">

                            <div class="separador-vertical"></div>

                            <input name="'. $i .'" value="'. $aluno['id_aluno'] .'" type="checkbox" class="input-checkbox" onclick="selectOnlyThis(this, '. $i .')"> 
                        </div>
                    </div>
            ';
        }
}


}
