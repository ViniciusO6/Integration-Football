<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/config/globals.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football-main/Integration-Football/model/professorModel.php';
include_once($_SERVER['DOCUMENT_ROOT'] . "/Integration-Football-main/Integration-Football/templetes/mensagemSessao.php");

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
            } elseif ($_POST['crud'] == "alterarSenha") {
                $this->redefinirSenha();
            }elseif($_POST['crud'] == "AtualizarFoto"){
                $this->AtualizarFotoPerfil();
            }
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

    public function AtualizarFotoPerfil()
    {
        $remoteUrl = "https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/uploadFotoPerfil.php";


        if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === 0) {
            $token = uniqid('', true);
            $fileName = $_FILES['foto_perfil']['name'];
            $tempFile = $_FILES['foto_perfil']['tmp_name'];
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




        $this->professor->setFotoPerfil("https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/FotosPerfil/".$uniqueFileName);
        $this->professor->setIdProfessor($_SESSION['id']);
        return $this->professor->AtualizarFotoPerfil();
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

    public function listarProfessoresInstituicao($id)
    {
        $this->professor->setIdProfessor($id);
        return $this->professor->listarProfessoresInstituicao();
    }

    public function redefinirSenha()
    {
        $this->professor->setIdProfessor($_POST['id']);
        $this->professor->setSenha($_POST['senha']);
        return $this->professor->redefinirSenha();
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
