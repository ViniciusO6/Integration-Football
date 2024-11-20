<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Integration-Football-main/Integration-Football/controller/conexao.php";
include_once($_SERVER['DOCUMENT_ROOT'] . "/Integration-Football-main/Integration-Football/templetes/mensagemSessao.php");


// Definição da classe Aluno
class Aluno
{
    // Propriedades da classe Pessoa
    private $id_aluno;
    private $nome_aluno;
    private $email_aluno;
    private $senha;
    private $data_nasc;
    private $cpf_aluno;
    private $telefone_aluno;
    private $conexao;


    // Métodos getters para obter os valores das propriedades
    public function getId()
    {
        return $this->id_aluno;
    }
    public function getNome()
    {
        return $this->nome_aluno;
    }
    public function getEmail()
    {
        return $this->email_aluno;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getDataNasc()
    {
        return $this->data_nasc;
    }
    public function getCPF()
    {
        return $this->cpf_aluno;
    }
    public function getTelefone()
    {
        return $this->telefone_aluno;
    }

    // Métodos setters para definir os valores das propriedades
    public function setId($id_aluno)
    {
        $this->id_aluno = $id_aluno;
    }
    public function setNome($nome_aluno)
    {
        $this->nome_aluno = $nome_aluno;
    }
    public function setEmail($email_aluno)
    {
        $this->email_aluno = $email_aluno;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function setDataNasc($data_nasc)
    {
        $this->data_nasc = $data_nasc;
    }
    public function setCPF($cpf_aluno)
    {
        $this->cpf_aluno = $cpf_aluno;
    }
    public function setTelefone($telefone_aluno)
    {
        $this->telefone_aluno = $telefone_aluno;
    }

    // Construtor da classe Pessoa
    public function __construct()
    {
        // Cria uma nova instância da classe Conexao para gerenciar a conexão com o banco de dados
        $this->conexao = new Conexao();
    }

    // Método para inserir um novo registro na tabela 'pessoa'
    public function inserir()
    {
        // SQL para inserir os dados na tabela 'pessoa'
        $sql = "INSERT INTO alunos (`nome_aluno`, `email_aluno`, `senha`, `data_nasc`, `cpf_aluno`, `telefone_aluno`) VALUES (?,?,?,?,?,?)";
        // Prepara a SQL para execução
        $stmt = $this->conexao->getConexao()->prepare($sql);
        // Vincula os parâmetros à SQL preparada
        $stmt->bind_param('ssssis', $this->nome_aluno, $this->email_aluno, $this->senha, $this->data_nasc, $this->cpf_aluno, $this->telefone_aluno);
        // Executa a SQL e retorna o resultado da execução
        return $stmt->execute();
    }

    public function buscarPorId($id)
    {

        $sql = "SELECT * FROM alunos WHERE id_aluno = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id); // Corrigido para usar $id em vez de $this->id
        $stmt->execute();

        $result = $stmt->get_result();
        $aluno = $result->fetch_assoc(); // Obtém apenas um único registro

        return $aluno;
    }

    public function update($id)
    {

        $sql = "UPDATE alunos SET `nome_aluno` = ?, `email_aluno` = ?, `senha` = ?, `data_nasc` = ?, `cpf_aluno` = ?, `telefone_aluno`= ? WHERE `id_aluno` = ? ";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssssis', $this->nome_aluno, $this->email_aluno, $this->senha, $this->data_nasc, $this->cpf_aluno, $this->telefone_aluno); // Corrigido para usar $id em vez de $this->id
        $stmt->execute();
    }

    public function listarAlunosPorTurma($id_turma)
    {
        $sql = "SELECT nome_aluno, email_aluno, id_aluno, id_turma FROM alunos WHERE id_turma = ? ORDER BY nome_aluno ASC";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id_turma); // Corrigido para usar $id em vez de $this->id
        $stmt->execute();
        $result = $stmt->get_result();
        $alunos = []; // Inicializa o array para armazenar os resultados

        // Utilize uma variável auxiliar para armazenar o resultado de fetch_assoc()
        while ($aluno = $result->fetch_assoc()) {
            $alunos[] = $aluno; // Adiciona cada pessoa ao array
        }
        return $alunos;
    }

    public function listarAlunosTurma()
    {
        $sql = "SELECT
    a.nome_aluno,
    a.email_aluno
FROM
    alunos AS a
WHERE
    a.id_turma = (
        SELECT id_turma
        FROM alunos
        WHERE id_aluno = ?
    );


        ";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $this->id_aluno); // Corrigido para usar $id em vez de $this->id
        $stmt->execute();
        $result = $stmt->get_result();
        $alunos = []; // Inicializa o array para armazenar os resultados

        // Utilize uma variável auxiliar para armazenar o resultado de fetch_assoc()
        while ($aluno = $result->fetch_assoc()) {
            $alunos[] = $aluno; // Adiciona cada pessoa ao array
        }
        return $alunos;
    }

    public function redefinirSenha(){
        $sql = "UPDATE alunos SET `senha` = ? WHERE `id_aluno` = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('si', $this->senha, $this->id_aluno);
        $message = new Message($_SERVER['DOCUMENT_ROOT']);
        $message->setMessage("Senha redefinida com sucesso!", "success", "back");
        return $stmt->execute();
        
    }



    public function listar()
    {
        $sql = "SELECT * FROM alunos ORDER BY nome_aluno ASC LIMIT 10 ";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $alunos = []; 

        while ($aluno = $result->fetch_assoc()) {
            $alunos[] = $aluno;
        }
        return $alunos;
    }

    public function buscarProfessores(){
        $sql = "SELECT professores.nome_professor, professores.id
                FROM professores
                INNER JOIN turma ON professores.id = turma.id_professor
                INNER JOIN alunos ON turma.id_turma = alunos.id_turma
                WHERE alunos.id_aluno = ?
                ORDER BY nome_professor ASC";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $this->id_aluno);
        $stmt->execute();
        $result = $stmt->get_result();
        $professores= []; 

        while ($professor = $result->fetch_assoc()) {
            $professores[] = $professor;
        }
        return $professores;
    }

    public function listarProfessoresInstituicao()
    {
        $sql = "SELECT DISTINCT
            professores.nome_professor,
            professores.email_professor
        FROM professores
        JOIN turma ON turma.id_professor = professores.id
        JOIN instituicao ON instituicao.id = turma.id_instituicao
        JOIN alunos ON alunos.id_turma = turma.id_turma
        WHERE alunos.id_aluno = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $this->id_aluno);
        $stmt->execute();
        $result = $stmt->get_result();
        $professores = []; // Inicializa o array para armazenar os resultados

        // Utilize uma variável auxiliar para armazenar o resultado de fetch_assoc()
        while ($professor = $result->fetch_assoc()) {
            $professores[] = $professor; // Adiciona cada professor ao array
        }
        return $professores;
    }

    public function delete($id)
    {

        $sql = "DELETE FROM alunos WHERE id = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id); // Corrigido para usar $id em vez de $this->id
        $stmt->execute();
    }
}
