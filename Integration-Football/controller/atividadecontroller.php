<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/model/atividadeModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/config/globals.php';

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
            header("Location:" . "../calendarioProfessor.php");

          exit; // Adicionado o exit para garantir que o código pare após o redirecionamento
        } else {
            $this->listar();
        }
    }

    public function inserir()
    {

        $remoteUrl = "https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/upload.php";


        if (isset($_FILES['arquivo_atividade']) && $_FILES['arquivo_atividade']['error'] === 0) {
            $token = uniqid('', true);
            $fileName = $_FILES['arquivo_atividade']['name'];
            $tempFile = $_FILES['arquivo_atividade']['tmp_name'];
            echo $fileName;

            $uniqueFileName = uniqid('', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $remoteUrl,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => [
                    'arquivo' => new CURLFile($tempFile, mime_content_type($tempFile), $uniqueFileName),
                ],
                CURLOPT_RETURNTRANSFER => true,
            ]);

            $response = curl_exec($curl);
            $error = curl_error($curl);

            curl_close($curl);

            if ($error) {
                echo "Erro ao enviar o arquivo: $error";
            } else {
                echo "Resposta do servidor remoto: $response";
            }
        } else {
            echo "Erro no envio do arquivo.";
        }

        $this->atividade->setTituloAtividade($_POST['titulo_atividade']);
        $this->atividade->setHoraInicio($_POST['hora_inicio']);
        $this->atividade->setHoraTermino($_POST['hora_termino']);
        $this->atividade->setDataEntrega($_POST['data_entrega']);
        $this->atividade->setNomeArquivo($fileName);
        $this->atividade->setCaminhoArquivo($uniqueFileName);
        $this->atividade->setIdTurma($_POST['id_turma']);
        $this->atividade->setIdProfessor($_POST['id_professor']);

        if ($this->atividade->inserir()) {
            echo "Atividade inserida com sucesso!";
        } else {
            echo "Erro ao inserir a atividade.";
        }
    }


    public function listar()
    {
        $atividades = $this->atividade->listar(); // Chama o método listar da classe Atividade
        return $atividades; // Retorna o resultado para ser exibido em uma view, se necessário
    }

    public function listarAtivividadesporProfessor($id_professor)
    {
        $this->atividade->setIdProfessor($id_professor);
        $atividades = $this->atividade->listarAtivividadesporProfessor(); // Chama o método listar da classe Atividade
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
