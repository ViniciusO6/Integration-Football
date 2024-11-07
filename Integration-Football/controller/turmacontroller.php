<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/model/turmaModel.php';

class TurmaController
{
    private $turma;

    public function __construct()
    {
        // Instancia um objeto da classe Turma
        $this->turma = new Turma();

        // Chama o método inserir, atualizar, ou deletar com base no valor do parâmetro 'crud'
        if (isset($_POST['crud'])) {

            if ($_POST['crud'] == "INSERT") {
                $this->inserir();
            } elseif ($_POST['crud'] == "UPDATE") {
                $this->atualizar();
            } elseif ($_POST['crud'] == "DELETE") {
                $this->deletar();
            }
            header("Location:" . "../principal.php"); //Redireciona para outra página
        } else {
            $this->listar();
        }
    }

    // Método para inserir uma nova turma
    public function inserir()
    {
        // Define os atributos da turma com base nos dados recebidos via POST
        $this->turma->setNome($_POST['nome']);
        $this->turma->setIdProfessor($_POST['id_professor']);
        $this->turma->setIdInstituicao($_POST['id_instituicao']);

        // Chama o método inserir da classe Turma para armazenar os dados no banco de dados
        $this->turma->inserir();
    }

    // Método para listar todas as turmas
    public function listar()
    {
        return $this->turma->listar();
    }

    // Método para deletar uma turma
    public function deletar()
    {
        $this->turma->setId($_POST['id']);
        return $this->turma->delete($this->turma->getId());
    }

    // Método para buscar uma turma por ID
    public function buscarPorId($id)
    {
        return $this->turma->buscarPorId($id);
    }

    // Método para atualizar os dados de uma turma
    public function atualizar()
    {
        $this->turma->setId($_POST['id']);
        $this->turma->setNome($_POST['nome']);
        $this->turma->setIdProfessor($_POST['id_professor']);
        $this->turma->setIdInstituicao($_POST['id_instituicao']);

        // Chama o método update da classe Turma para atualizar os dados no banco de dados
        $this->turma->update($this->turma->getId());
    }
}

// Instancia a classe TurmaController
new TurmaController();
?>
