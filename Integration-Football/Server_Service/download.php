<?php

$type = $_GET['type'];
$file = $_GET['file']; 

if($type == "atividade"){
   $filePath = 'https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/ArquivosAtividades/' . basename($file);
}else if($type == "justificativa"){
    $filePath = 'https://tcloud.site/filegator/repository/GrupoIntegrationFootball/Uploads/ArquivosJustificativa/' . basename($file);
}

$headers = get_headers($filePath, 1);
if (strpos($headers[0], '404') !== false) {
    echo "Arquivo não encontrado.";
    exit;
}

$ch = curl_init($filePath);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$fileContents = curl_exec($ch);
curl_close($ch);

if ($fileContents === false) {
    echo "Erro ao baixar o arquivo.";
    exit;
}

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file) . '"');
header('Content-Length: ' . strlen($fileContents));

echo $fileContents;
exit;
?>
