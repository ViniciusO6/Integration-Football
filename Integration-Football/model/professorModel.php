<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Integration-Football/Integration-Football/controller/conexao.php";

class Professor
{
    private $id_professor;
    private $nome_professor;
    private $cpf_professor;
    private $data_nasc;
    private $email_professor;
    private $senha;
    private $telefone_professor;
    private $conexao;

    // Getters
    public function getIdProfessor()
    {
        return $this->id_professor;
    }

    public function getNomeProfessor()
    {
        return $this->nome_professor;
    }

    public function getCpfProfessor()
    {
        return $this->cpf_professor;
    }

    public function getDataNasc()
    {
        return $this->data_nasc;
    }

    public function getEmailProfessor()
    {
        return $this->email_professor;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getTelefoneProfessor()
    {
        return $this->telefone_professor;
    }


    // Setters
    public function setIdProfessor($id_professor)
    {
        $this->id_professor = $id_professor;
    }

    public function setNomeProfessor($nome_professor)
    {
        $this->nome_professor = $nome_professor;
    }

    public function setCpfProfessor($cpf_professor)
    {
        $this->cpf_professor = $cpf_professor;
    }

    public function setDataNasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;
    }

    public function setEmailProfessor($email_professor)
    {
        $this->email_professor = $email_professor;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setTelefoneProfessor($telefone_professor)
    {
        $this->telefone_professor = $telefone_professor;
    }

    public function __construct() //  Método Construtor
    {
        $this->conexao = new Conexao();
    }

    public function inserir()
    {
        // SQL para inserir os dados na tabela 'professor'
        $sql = "INSERT INTO professores (`nome_professor`, `cpf_professor`, `data_nasc`, `email_professor`, `senha`, `telefone_professor`) VALUES (?,?,?,?,?,?)";

        // Prepara a SQL para execução
        $stmt = $this->conexao->getConexao()->prepare($sql);

        // Vincula os parâmetros à SQL preparada
        $stmt->bind_param('ssssss', $this->nome_professor, $this->cpf_professor, $this->data_nasc, $this->email_professor, $this->senha, $this->telefone_professor);

        // Executa a SQL e retorna o resultado da execução
        return $stmt->execute();
    }

    public function listar()
    {
        $sql = "SELECT * FROM professores";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $professores = []; // Inicializa o array para armazenar os resultados

        // Utilize uma variável auxiliar para armazenar o resultado de fetch_assoc()
        while ($professor = $result->fetch_assoc()) {
            $professores[] = $professor; // Adiciona cada professor ao array
        }
        return $professores;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM professores WHERE id = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id); // Usa o parâmetro $id para vinculação
        $stmt->execute();

        $result = $stmt->get_result();
        $professor = $result->fetch_assoc(); // Obtém apenas um único registro

        return $professor;
    }

    public function update($id)
    {
        $sql = "UPDATE professor SET `nome_professor` = ?, `email_professor` = ?, `senha` = ?, `data_nasc` = ?, `cpf_professor` = ?, `telefone_professor` = ? WHERE `id_professor` = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);

        // Vincula os parâmetros com os atributos e o ID
        $stmt->bind_param('ssssssi', $this->nome_professor, $this->email_professor, $this->senha, $this->data_nasc, $this->cpf_professor, $this->telefone_professor, $id);

        // Executa a SQL
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM professores WHERE id_professor = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);

        // Vincula o parâmetro ID
        $stmt->bind_param('i', $id);

        // Executa a SQL
        return $stmt->execute();
    }
}
