<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/model/professorModel.php';

class ProfessorController
{
    private $professor;

    public function __construct()
    {
        // Instancia um objeto da classe Pessoa
        $this->professor = new Professor();

        // Chama o método inserir para adicionar um novo aluno

        if (isset($_POST['crud'])) {

            if ($_POST['crud'] == "INSERT") {
                $this->inserir();
            } elseif ($_POST['crud'] == "UPDATE") {
                $this->atualizar();
            } elseif ($_POST['crud'] == "DELETE") {
                $this->deletar();
            }
            header("Location:" . "../principal.php"); //Redireciona para outra pagina
        } else {
            $this->listar();
        }
    }

    public function inserir()
    {
        // Define os atributos do professor com base nos dados recebidos via POST
        $this->professor->setNomeProfessor($_POST['nome']);
        $this->professor->setEmailProfessor($_POST['email']);
        $this->professor->setSenha($_POST['senha']);
        $this->professor->setDataNasc($_POST['dataNasc']);
        $this->professor->setCPFProfessor($_POST['cpf']);
        $this->professor->setTelefoneProfessor($_POST['telefone']);

        // Chama o método inserir da classe Professor para armazenar os dados no banco de dados
        $this->professor->inserir();
    }

    public function listar()
    {
        return $this->professor->listar();
    }

    public function deletar()
    {
        $this->professor->setIdProfessor($_POST['id']);
        return $this->professor->delete($this->professor->getIdProfessor());
    }

    public function buscarPorId($id)
    {
        return $this->professor->buscarPorId($id);
    }

    public function atualizar()
    {
        $this->professor->setIdProfessor($_POST['id']);
        $this->professor->setNomeProfessor($_POST['nome']);
        $this->professor->setEmailProfessor($_POST['email']);
        $this->professor->setSenha($_POST['senha']);
        $this->professor->setDataNasc($_POST['dataNasc']);
        $this->professor->setCPFProfessor($_POST['cpf']);
        $this->professor->setTelefoneProfessor($_POST['telefone']);

        // Chama o método update da classe Professor para atualizar os dados no banco de dados
        $this->professor->update($this->professor->getIdProfessor());
    }
}

new ProfessorController();
