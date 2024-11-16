<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/model/justificativaModel.php';

class JustificativaController
{
    private $justificativa;

    public function __construct()
    {
        // Instancia um objeto da classe Justificativa
        $this->justificativa = new Justificativa();

        // Chama o método inserir, atualizar ou deletar com base no valor do parâmetro 'crud'
        if (isset($_POST['crud'])) {

            if ($_POST['crud'] == "INSERT") {
                $this->inserir($_POST['data_falta']);
            } elseif ($_POST['crud'] == "UPDATE") {
                $this->atualizar();
            } elseif ($_POST['crud'] == "DELETE") {
                $this->deletar();
            }

            header("Location:" . "../principal.php"); // Redireciona para outra página após a operação
            exit; // Adicionado para garantir que o código pare após o redirecionamento
        } else {
            $this->listar();
        }
    }

    // Método para inserir uma nova justificativa
    public function inserir($data)
    {
        // Define os atributos da justificativa com base nos dados recebidos via POST
        $this->justificativa->setIdAluno($_POST['id_aluno']);
        $this->justificativa->setIdPresenca($_POST['id_presenca']);
        $this->justificativa->setDescricao($_POST['descricao']);
        $this->justificativa->setRespostaProfessor($_POST['resposta_professor']);
        $this->justificativa->setCaminhoArquivo($_POST['caminho_arquivo']);
        $this->justificativa->setAprovadoProfessor($_POST['aprovado_professor']);
        $this->justificativa->setAprovadoInstituicao($_POST['aprovado_instituicao']);

        // Chama o método inserir da classe Justificativa para armazenar os dados no banco de dados
        if ($this->justificativa->inserir($data)) {
            echo "Justificativa inserida com sucesso!";
        } else {
            echo "Erro ao inserir a justificativa.";
        }
    }

    // Método para listar todas as justificativas
    public function listar()
    {
        $justificativas = $this->justificativa->listar(); // Chama o método listar da classe Justificativa
        return $justificativas; // Retorna o resultado para ser exibido em uma view, se necessário
    }

    // Método para deletar uma justificativa
    public function deletar()
    {
        $this->justificativa->setIdJustificativa($_POST['id']);
        if ($this->justificativa->delete($this->justificativa->getIdJustificativa())) {
            echo "Justificativa deletada com sucesso!";
        } else {
            echo "Erro ao deletar a justificativa.";
        }
    }

    // Método para buscar uma justificativa por ID
    public function buscarPorId($id)
    {
        return $this->justificativa->buscarPorId($id); // Retorna a justificativa encontrada pelo ID
    }

    // Método para atualizar os dados de uma justificativa
    public function atualizar()
    {
        $this->justificativa->setIdJustificativa($_POST['id']);
        $this->justificativa->setIdAluno($_POST['id_aluno']);
        $this->justificativa->setIdPresenca($_POST['id_presenca']);
        $this->justificativa->setDescricao($_POST['descricao']);
        $this->justificativa->setRespostaProfessor($_POST['resposta_professor']);
        $this->justificativa->setCaminhoArquivo($_POST['caminho_arquivo']);
        $this->justificativa->setAprovadoProfessor($_POST['aprovado_professor']);
        $this->justificativa->setAprovadoInstituicao($_POST['aprovado_instituicao']);

        // Chama o método update da classe Justificativa para atualizar os dados no banco de dados
        if ($this->justificativa->update($this->justificativa->getIdJustificativa())) {
            echo "Justificativa atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a justificativa.";
        }
    }
}

// Instancia a classe JustificativaController
new JustificativaController();
