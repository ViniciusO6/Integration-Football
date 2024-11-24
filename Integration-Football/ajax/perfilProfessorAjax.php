<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/controller/turmacontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/controller/alunocontroller.php';

$turmacontroller = new TurmaController();
$alunocontroller = new AlunoController();
$id_professor = 5; 
$i = 0; 

if (isset($_POST['tipo']) && $_POST['tipo'] == "buscarTurmas" && isset($_POST['modalidade'])) {
    $modalidade = $_POST['modalidade'];
    $turmas = $turmacontroller->buscarPorModalidade($modalidade, $id_professor);
    
    foreach ($turmas as $turma) {
        $i++;  
        echo "<option id='turma-".$i."' value='" . $turma['id_turma'] . "'>" . htmlspecialchars($turma['nome_turma']) . "</option>";
    }
} 

?>
