<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/model/modalidadeModel.php';

class ModalidadeController
{
    private $modalidade;


    public function __construct()
    {
        // Instancia um objeto da classe Modalidade
        $this->modalidade = new Modalidade();

        // Chama o método inserir, atualizar, ou deletar com base no valor do parâmetro 'crud'
        if (isset($_POST['crud'])) {

            if ($_POST['crud'] == "INSERT") {
                $this->inserir();
            } elseif ($_POST['crud'] == "UPDATE") {
                $this->atualizar();
            } elseif ($_POST['crud'] == "DELETE") {
                $this->deletar();
            }

            header("Location:" . "../principal.php"); // Redireciona para outra página após a operação
            exit; // Adicionado o exit para garantir que o código pare após o redirecionamento
        } else {
            $this->listar();
        }
    }

    // Método para inserir uma nova modalidade
    public function inserir()
    {
        // Define os atributos da modalidade com base nos dados recebidos via POST
        $this->modalidade->setNome($_POST['nome']);
        $this->modalidade->setDescricao($_POST['descricao']);

        // Chama o método inserir da classe Modalidade para armazenar os dados no banco de dados
        if ($this->modalidade->inserir()) {
            echo "Modalidade inserida com sucesso!";
        } else {
            echo "Erro ao inserir a modalidade.";
        }
    }

    // Método para listar todas as modalidades
    public function listar()
    {
        $modalidades = $this->modalidade->listar(); // Chama o método listar da classe Modalidade
        return $modalidades; // Retorna o resultado para ser exibido em uma view, se necessário
    }

    // Método para deletar uma modalidade
    public function deletar()
    {
        $this->modalidade->setId($_POST['id']);
        if ($this->modalidade->delete($this->modalidade->getId())) {
            echo "Modalidade deletada com sucesso!";
        } else {
            echo "Erro ao deletar a modalidade.";
        }
    }

    // Método para buscar uma modalidade por ID
    public function buscarPorId($id)
    {
        return $this->modalidade->buscarPorId($id); // Retorna a modalidade encontrada pelo ID
    }

    // Método para buscar um nome modalidade 
    public function buscarNomeModalidade($idmodalidade)
    {
        return $this->modalidade->buscarNomeModalidade($idmodalidade); // Retorna a modalidade encontrada pelo ID
    }

    public function listarPorIdProfessor($idProfessor)
    {
        return $this->modalidade->listarPorIdProfessor($idProfessor); // Retorna a modalidade encontrada pelo ID
    }

    // Método para atualizar os dados de uma modalidade
    public function atualizar()
    {
        $this->modalidade->setId($_POST['id']);
        $this->modalidade->setNome($_POST['nome']);
        $this->modalidade->setDescricao($_POST['descricao']);

        // Chama o método update da classe Modalidade para atualizar os dados no banco de dados
        if ($this->modalidade->update($this->modalidade->getId())) {
            echo "Modalidade atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a modalidade.";
        }
    }
}

// Instancia a classe ModalidadeController
new ModalidadeController();
