<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/Integration-Football-main/Integration-Football/controller/conexao.php";
include_once($_SERVER['DOCUMENT_ROOT'] . "/Integration-Football-main/Integration-Football/templetes/mensagemSessao.php");

// Definição da classe Justificativa
class Justificativa
{
    // Propriedades da classe Justificativa (com os mesmos nomes dos campos do banco de dados)
    private $id_justificativa;
    private $id_aluno;
    private $id_presenca;
    private $descricao;
    private $resposta_professor;
    private $nome_arquivo;
    private $caminho_arquivo;
    private $aprovado_professor;
    private $aprovado_instituicao;
    private $conexao;
    

    // Construtor da classe Justificativa
    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    // Métodos getters e setters para os atributos
    public function getIdJustificativa()
    {
        return $this->id_justificativa;
    }

    public function setIdJustificativa($id_justificativa)
    {
        $this->id_justificativa = $id_justificativa;
    }

    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    public function setIdAluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;
    }

    public function getIdPresenca()
    {
        return $this->id_presenca;
    }

    public function setIdPresenca($id_presenca)
    {
        $this->id_presenca = $id_presenca;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getRespostaProfessor()
    {
        return $this->resposta_professor;
    }

    public function setRespostaProfessor($resposta_professor)
    {
        $this->resposta_professor = $resposta_professor;
    }

    public function getNomeArquivo()
    {
        return $this->nome_arquivo;
    }

    public function getCaminhoArquivo()
    {
        return $this->caminho_arquivo;
    }

    public function setNomeArquivo($nome_arquivo)
    {
        $this->nome_arquivo = $nome_arquivo;
    }

    public function setCaminhoArquivo($caminho_arquivo)
    {
        $this->caminho_arquivo = $caminho_arquivo;
    }

    public function getAprovadoProfessor()
    {
        return $this->aprovado_professor;
    }

    public function setAprovadoProfessor($aprovado_professor)
    {
        $this->aprovado_professor = $aprovado_professor;
    }

    public function getAprovadoInstituicao()
    {
        return $this->aprovado_instituicao;
    }

    public function setAprovadoInstituicao($aprovado_instituicao)
    {
        $this->aprovado_instituicao = $aprovado_instituicao;
    }

    // Método para inserir um novo registro na tabela 'justificativa_falta'
    public function inserir($data)
    {
        $sql = "
        SELECT presencas.id_presenca
        FROM presencas
        INNER JOIN aulas ON presencas.id_aula = aulas.id_aula
        WHERE presencas.id_aluno = ?
        AND aulas.data_aula = ?
        AND presencas.presente = 0
        AND aulas.data_aula = ?
        ";

        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('iss', $this->id_aluno, $data, $data);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $id_presenca = $row['id_presenca'];

            $remoteUrl = "https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/uploadArquivosJustificativa.php";


        if (isset($_FILES['arquivo_justificativa']) && $_FILES['arquivo_justificativa']['error'] === 0) {
            $fileName = $_FILES['arquivo_justificativa']['name'];
            $tempFile = $_FILES['arquivo_justificativa']['tmp_name'];
            $allowedExtensions = ['png', 'jpg', 'jpeg', 'pdf']; 
            $maxFileSize = 50 * 1024 * 1024;
            $fileSize = $_FILES['arquivo_justificativa']['size'];
        
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                $message = new Message($_SERVER['DOCUMENT_ROOT']);
                $message->setMessage("Tipo de arquivo não permitido.", "error", "back");
                die("Apenas PNG e JPG são aceitos.");
           }
        
            if ($fileSize > $maxFileSize) {
                die("Arquivo excede o tamanho máximo permitido de 2 MB.");
     
            }
        
            $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
        
            $mimeType = mime_content_type($tempFile);
            $allowedMimeTypes = ['image/png', 'image/jpg', 'image/jpeg', 'application/pdf'];
            if (!in_array($mimeType, $allowedMimeTypes)) {

                die("O tipo MIME do arquivo é inválido.");
            }
        
            $curl = curl_init();
        
            curl_setopt_array($curl, [
                CURLOPT_URL => $remoteUrl,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => [
                    'arquivo' => new CURLFile($tempFile, $mimeType, $uniqueFileName),
                ],
                CURLOPT_RETURNTRANSFER => true,
            ]);
        
            $response = curl_exec($curl);
            $error = curl_error($curl);
        
            curl_close($curl);
        
            if ($error) {
                echo "Erro ao enviar o arquivo: $error";
            } else {
                echo "Resposta do servidor remoto: $response";
            }
        } else {
            echo "Nenhum arquivo foi enviado.";
        }

            $aprovado_professor = NULL;
            $aprovado_instituicao = NULL;
            $sql = "INSERT INTO justificativa_falta (`id_aluno`, `id_presenca`, `descricao`, `resposta_professor`, `nome_arquivo`, `caminho_arquivo`, `aprovado_professor`, `aprovado_instituicao`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conexao->getConexao()->prepare($sql);
            $stmt->bind_param(
                'iissssii',
                $this->id_aluno,
                $id_presenca,
                $this->descricao,
                $this->resposta_professor,
                $fileName,
                $uniqueFileName,
                $aprovado_professor,
                $aprovado_instituicao
        );
        $message = new Message($_SERVER['DOCUMENT_ROOT']);
        $message->setMessage("Justificativa enviada com sucesso!", "success", "back");
        return $stmt->execute();
    }else{
        $message = new Message($_SERVER['DOCUMENT_ROOT']);
        $message->setMessage("Insira uma data valida.", "error", "back");
    }
    }

    // Método para buscar uma justificativa por ID
    public function buscarPorId($id_justificativa)
    {
        $sql = "SELECT * FROM justificativa_falta WHERE id_justificativa = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_justificativa);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Método para listar todas as justificativas
    public function listarJustificativasProfessor($id_professor)
    {
        $sql = "
        SELECT justificativa_falta.*, alunos.nome_aluno, aulas.data_aula
        FROM justificativa_falta
        INNER JOIN alunos ON justificativa_falta.id_aluno = alunos.id_aluno
        INNER JOIN turma ON turma.id_turma = alunos.id_turma
        INNER JOIN presencas ON presencas.id_presenca = justificativa_falta.id_presenca
        INNER JOIN aulas ON aulas.id_aula = presencas.id_aula
        WHERE turma.id_professor = ?  && justificativa_falta.aprovado_professor IS NULL
        ";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_professor);
        $stmt->execute();

        $result = $stmt->get_result();
        $justificativas = [];

        while ($justificativa = $result->fetch_assoc()) {
            $justificativas[] = $justificativa;
        }
        return $justificativas;
    }

    public function FiltrarPorTurma($id_turma)
    {
        $sql = "
        SELECT justificativa_falta.*, alunos.nome_aluno, aulas.data_aula
        FROM justificativa_falta
        INNER JOIN alunos ON justificativa_falta.id_aluno = alunos.id_aluno
        INNER JOIN turma ON turma.id_turma = alunos.id_turma
        INNER JOIN presencas ON presencas.id_presenca = justificativa_falta.id_presenca
        INNER JOIN aulas ON aulas.id_aula = presencas.id_aula
        WHERE alunos.id_turma = ?  && justificativa_falta.aprovado_professor IS NULL
        ";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_turma);
        $stmt->execute();

        $result = $stmt->get_result();
        $justificativas = [];

        while ($justificativa = $result->fetch_assoc()) {
            $justificativas[] = $justificativa;
        }
        return $justificativas;
    }

    public function listar()
    {
        $sql = "SELECT * FROM justificativa_falta";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();
        $justificativas = [];

        while ($justificativa = $result->fetch_assoc()) {
            $justificativas[] = $justificativa;
        }
        return $justificativas;
    }

    // Método para atualizar uma justificativa
    public function update($id_justificativa)
    {
        $sql = "UPDATE justificativa_falta 
                SET `id_aluno` = ?, `id_presenca` = ?, `descricao` = ?, `resposta_professor` = ?, `caminho_arquivo` = ?, `aprovado_professor` = ?, `aprovado_instituicao` = ? 
                WHERE `id_justificativa` = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param(
            'iisssiii',
            $this->id_aluno,
            $this->id_presenca,
            $this->descricao,
            $this->resposta_professor,
            $this->caminho_arquivo,
            $this->aprovado_professor,
            $this->aprovado_instituicao,
            $id_justificativa
        );
        return $stmt->execute();
    }

    public function respostaprofessor($id_justificativa, $resposta_professor)
    {
        $sql = "UPDATE justificativa_falta 
                SET `aprovado_professor` = ?
                WHERE `id_justificativa` = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param(
            'ii',  $resposta_professor, $id_justificativa
        );
        $message = new Message($_SERVER['DOCUMENT_ROOT']);
        $message->setMessage("Resposta enviada com sucesso!", "success", "back");
        return $stmt->execute();
    }
    

    // Método para excluir uma justificativa
    public function delete($id_justificativa)
    {
        $sql = "DELETE FROM justificativa_falta WHERE id_justificativa = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_justificativa);
        return $stmt->execute();
    }
}
