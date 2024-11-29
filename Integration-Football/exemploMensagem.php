<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/Integration-Football-main/Integration-Football/templetes/mensagemSessao.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include_once('./templetes/headerInstituicao.php');

    
    $senhaUsuario = 123;
    $senhaDigitada = $_POST['senha'];


    if($senhaUsuario == $senhaDigitada){
        $message = new Message($_SERVER['DOCUMENT_ROOT']);
        $message->setMessage("Senha alterada com sucesso", "success", "back");
    }else{
        $message->setMessage("Senha incorreta", "error", "back");
    }
    
    ?>
    
</body>
</html>