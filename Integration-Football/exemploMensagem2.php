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

    ?><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <form action="exemploMensagem.php" method="POST">
        <input type="text" name="senha" id="">

    <button>LOGAR</button>
    </form>
</body>
</html>