<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Integration-Football/Integration-Football/controller/conexao.php";

// Definição da classe Justificativa
class Justificativa
{
    // Propriedades da classe Justificativa (com os mesmos nomes dos campos do banco de dados)
    private $id_justificativa;
    private $id_aluno;
    private $id_presenca;
    private $descricao;
    private $resposta_professor;
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

    public function getCaminhoArquivo()
    {
        return $this->caminho_arquivo;
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
    public function inserir()
    {
        $sql = "INSERT INTO justificativa_falta (`id_aluno`, `id_presenca`, `descricao`, `resposta_professor`, `caminho_arquivo`, `aprovado_professor`, `aprovado_instituicao`) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param(
            'iisssii',
            $this->id_aluno,
            $this->id_presenca,
            $this->descricao,
            $this->resposta_professor,
            $this->caminho_arquivo,
            $this->aprovado_professor,
            $this->aprovado_instituicao
        );
        return $stmt->execute();
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

    // Método para excluir uma justificativa
    public function delete($id_justificativa)
    {
        $sql = "DELETE FROM justificativa_falta WHERE id_justificativa = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_justificativa);
        return $stmt->execute();
    }
}
