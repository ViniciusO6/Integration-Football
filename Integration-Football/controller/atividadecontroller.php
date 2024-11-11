<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/model/atividadeModel.php';

class AtividadeController
{
    private $atividade;

    public function __construct()
    {
        // Instancia um objeto da classe Atividade
        $this->atividade = new Atividade();

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

    // Método para inserir uma nova atividade
    public function inserir()
    {
        // Define os atributos da atividade com base nos dados recebidos via POST
        $this->atividade->setTituloAtividade($_POST['titulo_atividade']);
        $this->atividade->setHoraInicio($_POST['hora_inicio']);
        $this->atividade->setHoraTermino($_POST['hora_termino']);
        $this->atividade->setDataEntrega($_POST['data_entrega']);
        $this->atividade->setCaminhoArquivo($_POST['caminho_arquivo']);
        $this->atividade->setIdTurma($_POST['id_turma']);
        $this->atividade->setIdProfessor($_POST['id_professor']);

        // Chama o método inserir da classe Atividade para armazenar os dados no banco de dados
        if ($this->atividade->inserir()) {
            echo "Atividade inserida com sucesso!";
        } else {
            echo "Erro ao inserir a atividade.";
        }
    }

    // Método para listar todas as atividades
    public function listar()
    {
        $atividades = $this->atividade->listar(); // Chama o método listar da classe Atividade
        return $atividades; // Retorna o resultado para ser exibido em uma view, se necessário
    }

    // Método para deletar uma atividade
    public function deletar()
    {
        $this->atividade->setIdAtividade($_POST['id']);
        if ($this->atividade->delete($this->atividade->getIdAtividade())) {
            echo "Atividade deletada com sucesso!";
        } else {
            echo "Erro ao deletar a atividade.";
        }
    }

    // Método para buscar uma atividade por ID
    public function buscarPorId($id)
    {
        return $this->atividade->buscarPorId($id); // Retorna a atividade encontrada pelo ID
    }

    public function buscarAtividades($id)
    {
        return $this->atividade->buscarAtividades($id); // Retorna as atividades encontradas para a turma especificada
    }

    // Método para atualizar os dados de uma atividade
    public function atualizar()
    {
        $this->atividade->setIdAtividade($_POST['id']);
        $this->atividade->setTituloAtividade($_POST['titulo_atividade']);
        $this->atividade->setHoraInicio($_POST['hora_inicio']);
        $this->atividade->setHoraTermino($_POST['hora_termino']);
        $this->atividade->setDataEntrega($_POST['data_entrega']);
        $this->atividade->setCaminhoArquivo($_POST['caminho_arquivo']);
        $this->atividade->setIdTurma($_POST['id_turma']);
        $this->atividade->setIdProfessor($_POST['id_professor']);

        // Chama o método update da classe Atividade para atualizar os dados no banco de dados
        if ($this->atividade->update($this->atividade->getIdAtividade())) {
            echo "Atividade atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a atividade.";
        }
    }
}

// Instancia a classe AtividadeController
new AtividadeController();
?>
