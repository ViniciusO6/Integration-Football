<?php
$file = $_GET['file'];  
$filePath = 'http://tentreosbrothers.shop/uploads/' . basename($file);


$headers = get_headers($filePath, 1);
if ($headers[0] == 'HTTP/1.1 404 Not Found') {
    echo "Arquivo não encontrado.";
    exit;
}

$fileContents = file_get_contents($filePath);
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
