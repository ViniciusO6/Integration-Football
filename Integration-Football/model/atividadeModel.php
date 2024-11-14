<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Integration-Football-main/Integration-Football-main/Integration-Football/controller/conexao.php";

// Definição da classe Atividade
class Atividade {
    // Propriedades da classe Atividade (com os mesmos nomes dos campos do banco de dados)
    private $id_atividade;
    private $titulo_atividade;
    private $hora_inicio;
    private $hora_termino;
    private $data_entrega;
    private $caminho_arquivo;
    private $id_turma;
    private $id_professor;
    private $conexao;

    // Métodos getters para obter os valores das propriedades
    public function getIdAtividade() {
        return $this->id_atividade;
    }

    public function getTituloAtividade() {
        return $this->titulo_atividade;
    }

    public function getHoraInicio() {
        return $this->hora_inicio;
    }

    public function getHoraTermino() {
        return $this->hora_termino;
    }

    public function getDataEntrega() {
        return $this->data_entrega;
    }

    public function getCaminhoArquivo() {
        return $this->caminho_arquivo;
    }

    public function getIdTurma() {
        return $this->id_turma;
    }

    public function getIdProfessor() {
        return $this->id_professor;
    }

    // Métodos setters para definir os valores das propriedades
    public function setIdAtividade($id_atividade) {
        $this->id_atividade = $id_atividade;
    }

    public function setTituloAtividade($titulo_atividade) {
        $this->titulo_atividade = $titulo_atividade;
    }

    public function setHoraInicio($hora_inicio) {
        $this->hora_inicio = $hora_inicio;
    }

    public function setHoraTermino($hora_termino) {
        $this->hora_termino = $hora_termino;
    }

    public function setDataEntrega($data_entrega) {
        $this->data_entrega = $data_entrega;
    }

    public function setCaminhoArquivo($caminho_arquivo) {
        $this->caminho_arquivo = $caminho_arquivo;
    }

    public function setIdTurma($id_turma) {
        $this->id_turma = $id_turma;
    }

    public function setIdProfessor($id_professor) {
        $this->id_professor = $id_professor;
    }

    // Construtor da classe Atividade
    public function __construct() {
        $this->conexao = new Conexao();
    }

    // Método para inserir um novo registro na tabela 'atividade'
    public function inserir() {
        $sql = "INSERT INTO atividade (`titulo_atividade`, `hora_inicio`, `hora_termino`, `data_entrega`, `caminho_arquivo`, `id_turma`, `id_professor`) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssssiii', $this->titulo_atividade, $this->hora_inicio, $this->hora_termino, $this->data_entrega, $this->caminho_arquivo, $this->id_turma, $this->id_professor);
        return $stmt->execute();
    }

    // Método para buscar uma atividade por ID
    public function buscarPorId($id_atividade) {
        $sql = "SELECT * FROM atividade WHERE id_atividade = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_atividade);
        $stmt->execute();

        $result = $stmt->get_result();
        $atividade = $result->fetch_assoc();

        return $atividade;
    }

    // Método para atualizar uma atividade
    public function update($id_atividade) {
        $sql = "UPDATE atividade SET `titulo_atividade` = ?, `hora_inicio` = ?, `hora_termino` = ?, `data_entrega` = ?, `caminho_arquivo` = ?, `id_turma` = ?, `id_professor` = ? 
                WHERE `id_atividade` = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('sssssiii', $this->titulo_atividade, $this->hora_inicio, $this->hora_termino, $this->data_entrega, $this->caminho_arquivo, $this->id_turma, $this->id_professor, $id_atividade);
        $stmt->execute();
    }

    // Método para listar todas as atividades
    public function listar() {
        $sql = "SELECT * FROM atividade";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $atividades = [];

        while ($atividade = $result->fetch_assoc()) {
            $atividades[] = $atividade;
        }
        return $atividades;
    }

    public function buscarAtividades($id_turma) {
        $sql = "SELECT * FROM atividade WHERE id_turma = ? ORDER BY data_entrega ASC, hora_inicio ASC";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_turma);
        $stmt->execute();

        $result = $stmt->get_result();
        $atividades = [];

        while ($atividade = $result->fetch_assoc()) {
            $atividades[] = $atividade;
        }
        return $atividades;
    }

    public function delete($id_atividade) {
        $sql = "DELETE FROM atividade WHERE id_atividade = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_atividade);
        $stmt->execute();
    }
}
?>
