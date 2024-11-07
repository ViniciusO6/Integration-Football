<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Integration-Football/Integration-Football/controller/conexao.php";

// Definição da classe Modalidade
class Modalidade {
    // Propriedades da classe Modalidade
    private $id_modalidade;
    private $nome_modalidade;
    private $descricao;
    private $conexao;

    // Métodos getters para obter os valores das propriedades
    public function getId() {
        return $this->id_modalidade;
    }

    public function getNome() {
        return $this->nome_modalidade;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    // Métodos setters para definir os valores das propriedades
    public function setId($id_modalidade) {
        $this->id_modalidade = $id_modalidade;
    }

    public function setNome($nome_modalidade) {
        $this->nome_modalidade = $nome_modalidade;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    // Construtor da classe Modalidade
    public function __construct() {
        // Cria uma nova instância da classe Conexao para gerenciar a conexão com o banco de dados
        $this->conexao = new Conexao();
    }

    // Método para inserir um novo registro na tabela 'modalidade'
    public function inserir() {
        // SQL para inserir os dados na tabela 'modalidade'
        $sql = "INSERT INTO modalidade (`nome_modalidade`, `descricao`) VALUES (?, ?)";
        // Prepara a SQL para execução
        $stmt = $this->conexao->getConexao()->prepare($sql);
        // Vincula os parâmetros à SQL preparada
        $stmt->bind_param('ss', $this->nome_modalidade, $this->descricao);
        // Executa a SQL e retorna o resultado da execução
        return $stmt->execute();
    }

    // Método para buscar uma modalidade por ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM modalidade WHERE id = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $modalidade = $result->fetch_assoc(); // Obtém apenas um único registro

        return $modalidade;
    }

    // Método para atualizar uma modalidade
    public function update($id_modalidade) {
        $sql = "UPDATE modalidade SET `nome_modalidade` = ?, `descricao` = ? WHERE `id_modalidade` = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssi', $this->nome_modalidade, $this->descricao, $id_modalidade);
        $stmt->execute();
    }

    // Método para listar todas as modalidades
    public function listar() {
        $sql = "SELECT * FROM modalidade";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $modalidades = []; // Inicializa o array para armazenar os resultados

        // Utilize uma variável auxiliar para armazenar o resultado de fetch_assoc()
        while ($modalidade = $result->fetch_assoc()) {
            $modalidades[] = $modalidade; // Adiciona cada modalidade ao array
        }
        return $modalidades;
    }

    // Método para deletar uma modalidade
    public function delete($id_modalidade) {
        $sql = "DELETE FROM modalidade WHERE id_modalidade = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_modalidade);
        $stmt->execute();
    }
}
?>
