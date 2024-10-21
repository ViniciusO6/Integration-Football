<?php
session_start();

// Verifica se a sessão não está vazia, redireciona para a página de login se estiver
if (empty($_SESSION["usuario"])) {
    print "<script> location.href='login-duda.php'; </script>";
    exit; // Adiciona exit para garantir que o script pare aqui
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do professor</title>
</head>
<body>
<?php


if (empty($_SESSION["usuario"])) {
    print "<script> location.href='login-duda.php'; </script>";
    exit;
}


    print "Olá professor";

?>

    
</body>
</html>
