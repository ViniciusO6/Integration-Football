<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Integration-Football/Integration-Football/controller/conexao.php";

// Definição da classe Presenca
class Presenca
{
    // Propriedades da classe Presenca
    private $id_presenca;
    private $id_aluno;
    private $id_aula;
    private $presente;
    private $justificado; 
    private $conexao; 

    // Métodos getters para obter os valores das propriedades
    public function getIdPresenca()
    {
        return $this->id_presenca;
    }

    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    public function getIdAula()
    {
        return $this->id_aula;
    }

    public function getPresente()
    {
        return $this->presente;
    }

    public function getJustificado()
    {
        return $this->justificado;
    }

    // Métodos setters para definir os valores das propriedades
    public function setIdPresenca($id_presenca)
    {
        $this->id_presenca = $id_presenca;
    }

    public function setIdAluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;
    }

    public function setIdAula($id_aula)
    {
        $this->id_aula = $id_aula;
    }

    public function setPresente($presente)
    {
        $this->presente = $presente;
    }

    // Construtor da classe Presenca
    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    // Método para inserir um novo registro na tabela 'presencas'
    public function inserir()
    {
        $sql = "INSERT INTO presencas (`id_aluno`, `id_aula`, `presente`, `justificado`) 
                VALUES (?, ?, ?, NULL)";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('iis', $this->id_aluno, $this->id_aula, $this->presente);
        return $stmt->execute();
    }

    // Método para buscar uma presença por ID
    public function buscarPorId($id_presenca)
    {
        $sql = "SELECT * FROM presencas WHERE id_presenca = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_presenca);
        $stmt->execute();

        $result = $stmt->get_result();
        $presenca = $result->fetch_assoc();

        return $presenca;
    }

    // Método para atualizar uma presença
    public function update($id_presenca)
    {
        $sql = "UPDATE presencas SET `id_aluno` = ?, `id_aula` = ?, `presente` = ? 
                WHERE `id_presenca` = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('iisi', $this->id_aluno, $this->id_aula, $this->presente, $id_presenca);
        $stmt->execute();
    }

    // Método para listar todas as presenças
    public function listar()
    {
        $sql = "SELECT * FROM presencas";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $presencas = [];

        while ($presenca = $result->fetch_assoc()) {
            $presencas[] = $presenca;
        }
        return $presencas;
    }

    public function buscarPresencasPorAula($id_aula)
    {
        $sql = "SELECT * FROM presencas WHERE id_aula = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_aula);
        $stmt->execute();

        $result = $stmt->get_result();
        $presencas = [];

        while ($presenca = $result->fetch_assoc()) {
            $presencas[] = $presenca;
        }
        return $presencas;
    }

    public function delete($id_presenca)
    {
        $sql = "DELETE FROM presencas WHERE id_presenca = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_presenca);
        $stmt->execute();
    }
}
