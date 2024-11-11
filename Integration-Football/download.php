<?php
// Define o nome do arquivo a ser baixado
$file = $_GET['file'];  // O nome do arquivo será passado via parâmetro 'file' na URL
$filePath = 'http://tentreosbrothers.shop/uploads/' . basename($file);

// Verifica se a URL do arquivo existe
$headers = get_headers($filePath, 1);
if ($headers[0] == 'HTTP/1.1 404 Not Found') {
    echo "Arquivo não encontrado.";
    exit;
}

// Obtém o conteúdo do arquivo remoto
$fileContents = file_get_contents($filePath);
if ($fileContents === false) {
    echo "Erro ao baixar o arquivo.";
    exit;
}

// Define os cabeçalhos para forçar o download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file) . '"');
header('Content-Length: ' . strlen($fileContents));

// Envia o conteúdo do arquivo para o navegador
echo $fileContents;
exit;
?>
