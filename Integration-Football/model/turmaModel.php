<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Integration-Football/Integration-Football/controller/conexao.php";

// Definição da classe Turma
class Turma {
    // Propriedades da classe Turma
    private $id_turma;
    private $nome_turma;
    private $id_professor;
    private $id_instituicao;
    private $conexao;

    // Métodos getters para obter os valores das propriedades
    public function getId() {
        return $this->id_turma;
    }

    public function getNome() {
        return $this->nome_turma;
    }

    public function getIdProfessor() {
        return $this->id_professor;
    }

    public function getIdInstituicao() {
        return $this->id_instituicao;
    }

    // Métodos setters para definir os valores das propriedades
    public function setId($id_turma) {
        $this->id_turma = $id_turma;
    }

    public function setNome($nome_turma) {
        $this->nome_turma = $nome_turma;
    }

    public function setIdProfessor($id_professor) {
        $this->id_professor = $id_professor;
    }

    public function setIdInstituicao($id_instituicao) {
        $this->id_instituicao = $id_instituicao;
    }

    // Construtor da classe Turma
    public function __construct() {
        // Cria uma nova instância da classe Conexao para gerenciar a conexão com o banco de dados
        $this->conexao = new Conexao();
    }

    // Método para inserir um novo registro na tabela 'turma'
    public function inserir() {
        // SQL para inserir os dados na tabela 'turma'
        $sql = "INSERT INTO turma (`nome_turma`, `id_professor`, `id_instituicao`) VALUES (?,?,?)";
        // Prepara a SQL para execução
        $stmt = $this->conexao->getConexao()->prepare($sql);
        // Vincula os parâmetros à SQL preparada
        $stmt->bind_param('sii', $this->nome_turma, $this->id_professor, $this->id_instituicao);
        // Executa a SQL e retorna o resultado da execução
        return $stmt->execute();
    }

    // Método para buscar uma turma por ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM turma WHERE id_turma = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $turma = $result->fetch_assoc(); // Obtém apenas um único registro

        return $turma;
    }

    // Método para atualizar uma turma
    public function update($id) {
        $sql = "UPDATE turma SET `nome_turma` = ?, `id_professor` = ?, `id_instituicao` = ? WHERE `id_turma` = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('siii', $this->nome_turma, $this->id_professor, $this->id_instituicao, $id);
        $stmt->execute();
    }

    // Método para listar todas as turmas
    public function listar() {
        $sql = "SELECT * FROM turma";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $turmas = []; // Inicializa o array para armazenar os resultados

        // Utilize uma variável auxiliar para armazenar o resultado de fetch_assoc()
        while ($turma = $result->fetch_assoc()) {
            $turmas[] = $turma; // Adiciona cada turma ao array
        }
        return $turmas;
    }

    // Método para deletar uma turma
    public function delete($id) {
        $sql = "DELETE FROM turma WHERE id_turma = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
?>
