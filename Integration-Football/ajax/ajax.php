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
            <p> '. $aluno['nome_aluno'] . '</p>
            <div class="separador-horizontal"></div>
        </div>
        ';
 }
} 

else if (isset($_POST['tipo']) && $_POST['tipo'] == "buscarTurmas" && isset($_POST['modalidade'])) {
    $modalidade = $_POST['modalidade'];
    $turmas = $turmacontroller->buscarPorModalidade($modalidade, $id_professor);
    echo '<option value="" disabled selected hidden>Escolha uma turma</option>';
    
    foreach ($turmas as $turma) {
        $i++;  
        echo "<option id='turma-".$i."' value='" . $turma['id_turma'] . "'>" . htmlspecialchars($turma['nome_turma']) . "</option>";
    }
} else if(isset($_POST['tipo']) && $_POST['tipo'] == "carregarEmail"){
    $modalidade = $_POST['modalidade'];
    $turma = $_POST['turma'];

    $alunos = $alunocontroller->listarAlunosPorTurma($turma);

     foreach ($alunos as $aluno) { 
        echo '
        <div id="tr-nome">
            <p> '. $aluno['email_aluno'] . '</p>
            <div class="separador-horizontal"></div>
        </div>
        ';}
}
else if(isset($_POST['tipo']) && $_POST['tipo'] == "carregarNomeTurma") {
    $turma = $_POST['turma'];
    $turmas = $turmacontroller->buscarPorId($_POST['turma']);
    $alunos = $alunocontroller->listarAlunosPorTurma($turma);
    
    foreach ($alunos as $aluno) {
        echo
        '
        <div id="tr-nome">
             <p>Turma '. $turmas['nome_turma'] .'</p>
            <div class="separador-horizontal"></div>
        </div>
                    
        ';
    }
}

?>
