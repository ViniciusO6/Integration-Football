<?php
  include_once('../config.php'); 
  include_once($_SERVER['DOCUMENT_ROOT'] . "/Integration-Football-main/Integration-Football/templetes/mensagemSessao.php");


  $remoteUrl = "https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/uploadFotoPerfil.php";


        if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === 0) {
            $fileName = $_FILES['foto_perfil']['name'];
            $tempFile = $_FILES['foto_perfil']['tmp_name'];
            $allowedExtensions = ['png', 'jpg', 'jpeg']; 
            $maxFileSize = 50 * 1024 * 1024;
            $fileSize = $_FILES['foto_perfil']['size'];
        
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                $message = new Message($_SERVER['DOCUMENT_ROOT']);
                $message->setMessage("Tipo de arquivo não permitido.", "error", "back");
                die("Apenas PNG e JPG são aceitos.");
           }
        
            if ($fileSize > $maxFileSize) {
                die("Arquivo excede o tamanho máximo permitido de 2 MB.");
     
            }
        
            $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
        
            $mimeType = mime_content_type($tempFile);
            $allowedMimeTypes = ['image/png', 'image/jpg', 'image/jpeg'];
            if (!in_array($mimeType, $allowedMimeTypes)) {

                die("O tipo MIME do arquivo é inválido.");
            }
        
            $curl = curl_init();
        
            curl_setopt_array($curl, [
                CURLOPT_URL => $remoteUrl,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => [
                    'arquivo' => new CURLFile($tempFile, $mimeType, $uniqueFileName),
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
            echo "Nenhum arquivo foi enviado.";
        }

        $caminho =  ("https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/FotosPerfil/".$uniqueFileName);
    $id = $_POST['id'];
  $sql = "UPDATE instituicao SET `foto_perfil` = ? WHERE `id` = ?";
         $stmt = $conn->prepare($sql);
        $stmt->bind_param('si',$caminho, $id);
        $stmt->execute();
        $message = new Message($_SERVER['DOCUMENT_ROOT']);
        $message->setMessage("Foto de perfil alterada com sucesso", "success", "back");
        

?>