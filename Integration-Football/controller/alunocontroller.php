<?php

// Inclui o arquivo contendo a definição do model Aluno
require_once $_SERVER['DOCUMENT_ROOT'].'/Integration-Football-main/Integration-Football/model/alunoModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/config/globals.php';

class AlunoController {
    // Propriedade para armazenar um objeto Aluno
    private $aluno;

    
    // Construtor da classe PessoaController
    public function __construct() {
        // Instancia um objeto da classe Pessoa
        $this->aluno = new Aluno();
        
        // Chama o método inserir para adicionar um novo aluno
       
        if(isset($_POST['crud'])){
           
            if($_POST['crud']=="INSERT"){
                $this->inserir();
            }elseif($_POST['crud']=="UPDATE"){
                 $this->atualizar();
            }elseif($_POST['crud']=="DELETE"){
                $this->deletar();
            }elseif ($_POST['crud'] == "alterarSenha") {
                $this->redefinirSenha();
            }
        }else{
            $this->listar();

        }
    }

    // Método para inserir uma nova pessoa
    public function inserir() {
        // Define os atributos da pessoa com base nos dados recebidos via POST
        $this->aluno->setNome($_POST['nome']);
        $this->aluno->setEmail($_POST['email']);
        $this->aluno->setSenha($_POST['senha']);
        $this->aluno->setDataNasc($_POST['dataNasc']);
        $this->aluno->setCPF($_POST['cpf']);
        $this->aluno->setTelefone($_POST['telefone']);
        // Chama o método inserir da classe Pessoa para armazenar os dados no banco de dados
        $this->aluno->inserir();
    }

    public function listar(){
        return $this->aluno->listar();
    }

    public function deletar(){
        $this->aluno->setId($_POST['id']);
        return $this->aluno->delete($this->aluno->getId());

    }

    public function buscarPorId($id){
        return $this->aluno->buscarPorId($id);
    }

    public function listarAlunosPorTurma($id_turma){
        return $this->aluno->listarAlunosPorTurma($id_turma);
    }

    public function buscarProfessores($id_aluno){
        $this->aluno->setId($id_aluno);
        return $this->aluno->buscarProfessores();
    }

    public function listarProfessoresInstituicao($id_aluno){
        $this->aluno->setId($id_aluno);
        return $this->aluno->listarProfessoresInstituicao();
    }

    public function listarAlunosTurma($id){
        $this->aluno->setId($id);
        return $this->aluno->listarAlunosTurma();
    }

    public function redefinirSenha()
    {
        $this->aluno->setId($_POST['id']);
        $this->aluno->setSenha($_POST['senha']);
        return $this->aluno->redefinirSenha();
    }

    public function atualizar(){
        $this->aluno->setId($_POST['id']);
        $this->aluno->setNome($_POST['nome']);
        $this->aluno->setEmail($_POST['email']);
        $this->aluno->setSenha($_POST['senha']);
        $this->aluno->setDataNasc($_POST['dataNasc']);
        $this->aluno->setCPF($_POST['cpf']);
        $this->aluno->setTelefone($_POST['telefone']);

        $this->aluno->update($this->aluno->getId());
}
}
// Cria uma instância da classe PessoaController para acionar a inserção de uma nova pessoa
new AlunoController();

?>
