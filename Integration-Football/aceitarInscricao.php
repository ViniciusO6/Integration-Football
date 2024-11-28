<?php
include_once('./config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitização e recebimento do ID da inscrição
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;
    if (!$id) {
        echo "ID não fornecido.";
        exit;
    }

    // Buscar os dados da inscrição
    $stmt = $conn->prepare("SELECT * FROM inscricao WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        echo "Nenhuma inscrição encontrada para o ID: $id.";
        exit;
    }

    $inscricao = $result->fetch_assoc(); // Dados da inscrição

    // Verificar se o formulário foi enviado com a turma escolhida
    if (isset($_POST['turma'])) {
        $turma = $_POST['turma']; // ID da turma escolhida

        // Verificar se a turma existe no banco de dados
        $stmtTurma = $conn->prepare("SELECT id_turma FROM turma WHERE nome_turma = ?");
        $stmtTurma->bind_param("s", $turma);
        $stmtTurma->execute();
        $resultTurma = $stmtTurma->get_result();

        if ($resultTurma->num_rows === 0) {
            echo "Turma não encontrada.";
            exit;
        }

        $turmaData = $resultTurma->fetch_assoc();
        $idTurma = $turmaData['id_turma']; // ID da turma escolhida
        $foto_perfil = './Imagens/user.png';
        // Inserir os dados na tabela 'alunos'
        $senha = $_POST['senha'];
        echo $senha;
        $stmtAluno = $conn->prepare("
            INSERT INTO alunos (nome_aluno, email_aluno, id_turma, senha, data_nasc, cpf_aluno, telefone_aluno, foto_perfil) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmtAluno->bind_param(
            "ssisssss", 
            $inscricao['nome_inscrito'], 
            $inscricao['email_inscrito'],
            $idTurma,
            $senha,
            $inscricao['data_nasc'],
            $inscricao['Cpf_inscrito'],  
            $inscricao['telefone_inscrito'], 
            $foto_perfil

        );

        if ($stmtAluno->execute()) {
            // Atualizar o status da inscrição para "ativa"
            $stmtUpdate = $conn->prepare("UPDATE inscricao SET status = 'ativa' WHERE id = ?");
            $stmtUpdate->bind_param("i", $id);

            if ($stmtUpdate->execute()) {
                echo "Aluno cadastrado com sucesso e inscrição ativada!";
                header("Location: visualizarInscricoes.php");
                exit;
            } else {
                echo "Erro ao atualizar o status da inscrição.";
            }
        } else {
            echo "Erro ao cadastrar aluno: " . $stmtAluno->error;
        }
    }
}

// Buscar as turmas disponíveis no banco de dados para o select
$stmtTurmas = $conn->prepare("SELECT id_turma, nome_turma FROM turma");
$stmtTurmas->execute();
$resultTurmas = $stmtTurmas->get_result();
$turmas = [];
while ($row = $resultTurmas->fetch_assoc()) {
    $turmas[] = $row;
}
?>

<!-- Exibir o formulário de aceitação da inscrição -->
<link rel="stylesheet" href="css/aceitarInscricao.css">
<div class="container">
    <h1>Cadastro do Aluno</h1>
    <form action="aceitarInscricao.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id, ENT_QUOTES) ?>"> <!-- ID seguro -->
        <input type="hidden" name="senha" value="<?= ($inscricao['senha_inscrito']) ?>">
        <label for="nome">Nome do Aluno:</label>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($inscricao['nome_inscrito'], ENT_QUOTES) ?>" readonly>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($inscricao['email_inscrito'], ENT_QUOTES) ?>" readonly>

        <label for="unidade">Unidade:</label>
        <input type="text" name="unidade" id="unidade" value="<?= htmlspecialchars($inscricao['unidadeInscrito'], ENT_QUOTES) ?>" readonly>

        <label for="modalidade">Modalidade:</label>
        <input type="text" name="modalidade" id="modalidade" value="<?= htmlspecialchars($inscricao['modalidadeInscrito'], ENT_QUOTES) ?>" readonly>

        <label for="turma">Turma:</label>
        <select name="turma" id="turma" required>
            <?php foreach ($turmas as $turma): ?>
                <option value="<?= htmlspecialchars($turma['nome_turma'], ENT_QUOTES) ?>"><?= htmlspecialchars($turma['nome_turma'], ENT_QUOTES) ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Salvar</button>
    </form>
</div>
