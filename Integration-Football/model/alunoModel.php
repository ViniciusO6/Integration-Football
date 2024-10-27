<?php
echo $_SERVER['DOCUMENT_ROOT'];
require_once $_SERVER['DOCUMENT_ROOT'] . "/Integration-Football/controller/conexao.php";


// Definição da classe Aluno
class Aluno {
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
    public function getId() {
        return $this->id_aluno;
    }
    public function getNome() {
        return $this->nome_aluno;
    }
    public function getEmail() {
        return $this->email_aluno;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function getDataNasc() {
        return $this->data_nasc;
    }
    public function getCPF() {
        return $this->cpf_aluno;
    }
    public function getTelefone() {
        return $this->telefone_aluno;
    }

    // Métodos setters para definir os valores das propriedades
    public function setId($id_aluno) {
        $this->id_aluno = $id_aluno;
    }
    public function setNome($nome_aluno) {
        $this->nome_aluno = $nome_aluno;
    }
    public function setEmail($email_aluno) {
        $this->email_aluno = $email_aluno;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function setDataNasc($data_nasc) {
        $this->data_nasc = $data_nasc;
    }
    public function setCPF($cpf_aluno) {
        $this->cpf_aluno = $cpf_aluno;
    }
    public function setTelefone($telefone_aluno) {
        $this->telefone_aluno = $telefone_aluno;
    }

        // Construtor da classe Pessoa
    public function __construct() {
                // Cria uma nova instância da classe Conexao para gerenciar a conexão com o banco de dados
            $this->conexao = new Conexao();
}

        // Método para inserir um novo registro na tabela 'pessoa'
    public function inserir() {
            // SQL para inserir os dados na tabela 'pessoa'
        $sql = "INSERT INTO alunos (`nome_aluno`, `email_aluno`, `senha`, `data_nasc`, `cpf_aluno`, `telefone_aluno`) VALUES (?,?,?,?,?,?)";
            // Prepara a SQL para execução
        $stmt = $this->conexao->getConexao()->prepare($sql);
            // Vincula os parâmetros à SQL preparada
        $stmt->bind_param('ssssis', $this->nome_aluno, $this->email_aluno, $this->senha, $this->data_nasc, $this->cpf_aluno, $this->telefone_aluno);
        // Executa a SQL e retorna o resultado da execução
        return $stmt->execute();
    }

    public function buscarPorId($id){
        
        $sql = "SELECT * FROM alunos WHERE id_aluno = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id); // Corrigido para usar $id em vez de $this->id
        $stmt->execute();
    
        $result = $stmt->get_result();
        $aluno = $result->fetch_assoc(); // Obtém apenas um único registro

        return $aluno;
    }

    public function update($id){
        
        $sql = "UPDATE alunos SET `nome_aluno` = ?, `email_aluno` = ?, `senha` = ?, `data_nasc` = ?, `cpf_aluno` = ?, `telefone_aluno`= ? WHERE `id_aluno` = ? ";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('ssssis', $this->nome_aluno, $this->email_aluno, $this->senha, $this->data_nasc, $this->cpf_aluno, $this->telefone_aluno); // Corrigido para usar $id em vez de $this->id
        $stmt->execute();
    }
    

    public function listar(){
        $sql = "SELECT * FROM alunos";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $alunos = []; // Inicializa o array para armazenar os resultados
    
        // Utilize uma variável auxiliar para armazenar o resultado de fetch_assoc()
        while($aluno = $result->fetch_assoc()){ 
            $alunos[] = $aluno; // Adiciona cada pessoa ao array
        }
        return $aluno;
    }

    public function delete($id){
        
        $sql = "DELETE FROM alunos WHERE id = ?";
        $stmt = $this->conexao->getConexao()->prepare($sql);
        $stmt->bind_param('i', $id); // Corrigido para usar $id em vez de $this->id
        $stmt->execute();
    }

    



}
    
?>