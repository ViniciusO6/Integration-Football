<?php
require_once '../config/globals.php';
require_once '../model/presencaModel.php';
include_once ("../templetes/mensagemSessao.php");

class PresencaController
{
    private $presenca;

    public function __construct()
    {
        // Instancia um objeto da classe Presenca
        $this->presenca = new Presenca();

        // Chama o método inserir, atualizar, ou deletar com base no valor do parâmetro 'crud'
        if (isset($_POST['crud'])) {

            if ($_POST['crud'] == "INSERT") {
                $this->inserir($_POST['id_turma'], $_POST['data_aula']);
            } elseif ($_POST['crud'] == "UPDATE") {
                $this->atualizar();
            } elseif ($_POST['crud'] == "DELETE") {
                $this->deletar();
            }

            exit; // Adicionado o exit para garantir que o código pare após o redirecionamento
        } else {
            $this->listar();
        }
    }

    // Método para inserir uma nova presença
    public function inserir($id_turma, $data_aula)
    {
         // Verifica se o array de presença foi enviado
    if (isset($_POST['presenca']) && is_array($_POST['presenca'])) {
        $dadosPresenca = $_POST['presenca']; // Array de presença

        // Percorre cada aluno no array
        foreach ($dadosPresenca as $idAluno => $presente) {
            // Define os atributos para cada registro
            $this->presenca->setIdAluno($idAluno);
            $this->presenca->setPresente($presente);

            // Insere o registro no banco de dados
            if (!$this->presenca->inserir($id_turma, $data_aula)) {
                // Caso falhe, exibe uma mensagem de erro
                echo "Erro ao inserir a presença do aluno com ID: $idAluno.";
                return;
            }
        }

        // Se tudo foi bem, exibe mensagem de sucesso
        echo "Presenças inseridas com sucesso!";
        
   
    } else {
        $message = new Message($_SERVER['DOCUMENT_ROOT']);
        $message->setMessage("Nenhum dado de presença recbido", "error", "back");
    }
    }

    // Método para listar todas as presenças
    public function listar()
    {
        $presencas = $this->presenca->listar(); // Chama o método listar da classe Presenca
        return $presencas; // Retorna o resultado para ser exibido em uma view, se necessário
    }

    // Método para deletar uma presença
    public function deletar()
    {
        $this->presenca->setIdPresenca($_POST['id']);
        if ($this->presenca->delete($this->presenca->getIdPresenca())) {
            echo "Presença deletada com sucesso!";
        } else {
            echo "Erro ao deletar a presença.";
        }
    }

    // Método para buscar uma presença por ID
    public function buscarPorId($id)
    {
        return $this->presenca->buscarPorId($id); // Retorna a presença encontrada pelo ID
    }

    // Método para buscar presenças por aula
    public function buscarPresencasPorAula($id_aula)
    {
        return $this->presenca->buscarPresencasPorAula($id_aula); // Retorna as presenças para a aula especificada
    }

    // Método para atualizar os dados de uma presença
    public function atualizar()
    {
        $this->presenca->setIdPresenca($_POST['id']);
        $this->presenca->setIdAluno($_POST['id_aluno']);
        $this->presenca->setIdAula($_POST['id_aula']);
        $this->presenca->setPresente($_POST['presente']);

        // Chama o método update da classe Presenca para atualizar os dados no banco de dados
        if ($this->presenca->update($this->presenca->getIdPresenca())) {
            echo "Presença atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a presença.";
        }
    }
}

// Instancia a classe PresencaController
new PresencaController();
