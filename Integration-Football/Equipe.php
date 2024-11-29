<?php

$imports = [
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
];
$titulo = 'Verificar Equipe';
$pageCSS = ["equipe.css"];
include_once('./templetes/headerInstituicao.php');

require_once './config.php'; // Conexão com o banco de dados

// Consultar os professores
$queryProfessores = "SELECT id, nome_professor, email_professor FROM professores";
$resultProfessores = $conn->query($queryProfessores);
$professores = $resultProfessores->fetch_all(MYSQLI_ASSOC);

// Consultar modalidades para o select
$queryModalidades = "SELECT id, nome_modalidade FROM modalidade";
$resultModalidades = $conn->query($queryModalidades);
$modalidades = $resultModalidades->fetch_all(MYSQLI_ASSOC);

// Consultar turmas para o select
$queryTurmas = "SELECT id_turma, nome_turma FROM turma";
$resultTurmas = $conn->query($queryTurmas);
$turmas = $resultTurmas->fetch_all(MYSQLI_ASSOC);
?>

<div class="container">
    <div id="consulta">
        <div id="form">
            <!-- Bloco de Professores -->
            <h1 id="titulo">PROFESSORES</h1>
            <div class="table-block">
                <div class="table-header">
                    <div class="table-cell">Nome</div>
                    <div class="table-cell">E-mail</div>
                </div>
                <div id="table">
                    <?php foreach ($professores as $professor): ?>
                        <div class="table-row">
                            <div class="table-cell"><?= htmlspecialchars($professor['nome_professor']) ?></div>
                            <div class="table-cell"><?= htmlspecialchars($professor['email_professor']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Bloco de Alunos -->
            <h1 id="titulo">ALUNOS</h1>
            <form id="form-filtro" method="POST">
                <select required name="modalidade" id="select-modalidade" onChange="this.form.submit()">
                    <option value="" disabled selected hidden>Escolha uma modalidade</option>
                    <?php foreach ($modalidades as $modalidade): ?>
                        <option value="<?= $modalidade['id'] ?>" <?= isset($_POST['modalidade']) && $_POST['modalidade'] == $modalidade['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($modalidade['nome_modalidade']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <select required name="turma" id="select-turma" onChange="this.form.submit()">
                    <option value="0" disabled selected hidden>Escolha uma turma</option>
                    <?php foreach ($turmas as $turma): ?>
                        <option value="<?= $turma['id_turma'] ?>" <?= isset($_POST['turma']) && $_POST['turma'] == $turma['id_turma'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($turma['nome_turma']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>

            <div class="table-block">
                <div class="table-header">
                    <div class="table-cell">Alunos</div>
                    <div class="table-cell">E-mail</div>
                </div>
                <div id="table">
                    <?php if (!empty($_POST['turma'])):
                        $turmaId = $_POST['turma'];

                        // Consultar os alunos com base na turma
                        $queryAlunos = "SELECT a.nome_aluno, a.email_aluno FROM alunos a INNER JOIN turma t ON a.id_turma = t.id_turma WHERE t.id_turma = ?";
                        // Preparar a consulta
                        $stmt = $conn->prepare($queryAlunos);
                        // Vincular os parâmetros
                        $stmt->bind_param("i", $turmaId);
                        $stmt->execute();
                        $resultAlunos = $stmt->get_result();
                        $alunos = $resultAlunos->fetch_all(MYSQLI_ASSOC);

                        foreach ($alunos as $aluno): ?>
                            <div class="table-row">
                                <div class="table-cell"><?= htmlspecialchars($aluno['nome_aluno']) ?></div>
                                <div class="table-cell"><?= htmlspecialchars($aluno['email_aluno']) ?></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>




