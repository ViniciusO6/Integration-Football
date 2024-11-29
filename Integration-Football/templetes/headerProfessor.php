<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php
// Verifica se o logout foi solicitado
if (isset($_GET['logout'])) {
    // Destrói a sessão e redireciona para a página de login
    session_unset();  // Remove todas as variáveis de sessão
    session_destroy();  // Destroi a sessão
    header("Location: login.php");  // Redireciona para a página de login
    exit();
}
include_once('templetes/mensagemSessao.php');
    $message = new Message($_SERVER['DOCUMENT_ROOT']);
    $flassMessage = $message->getMessage();
    if(!empty($flassMessage["msg"])) {
        //limpar a mensagem
        $message->clearMessage();
    }

    ?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templetes/headerProfessor.css">
    <link rel="stylesheet" href="templetes/footer.css">
    <link rel="icon" href="./Imagens/icon.jpeg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="templetes/mensagemSessao.css">
    <script src="templetes/mensagemSessao.js"></script>
    <script src="templetes/menu.js" defer></script>
    <title><?= $titulo ?></title>

    <?php 
    if (isset($pageJS) && is_array($pageJS)) {
        foreach ($pageJS as $jsFile) {
            echo '<script src="css/' . $jsFile . '" defer></script>';
        }
    }
    ?>

    <?php 
    if (isset($pageCSS) && is_array($pageCSS)) {
        foreach ($pageCSS as $cssFile) {
            echo '<link rel="stylesheet" href="css/' . $cssFile . '">';
        }
    }
    
    if (isset($imports) && is_array($imports)) {
        foreach ($imports as $fontUrl) {
            echo '<link rel="stylesheet" href="' . $fontUrl . '">';
        }
    }
    ?>

    
</head>
<body>
 
    <header>

        <div id="part-1">

            <button onclick="alterarMenu()" id="menu-sanduiche" src="menu.svg" alt="Menu"></button>

                <img id="logo" src="templetes/logonova.png" alt="">

            <div id="navbar-part-1">
                    <li><a href="calendarioProfessor.php">Calendário</a></li>
                    <li><a href="presencaProfessor.php">Diário</a></li>
                    <li><a href="consultaProfessor.php">Consulta</a></li>
                    <li><a href="turmasProfessor.php">Turmas</a></li>

            </div>
        </div>


        <div id="part-2">
            <div id="navbar-part-2">
                <<!-- Alterado o onclick para chamar a função confirmarSair() -->
                <button onclick="confirmarSair()" style="cursor: pointer;" id="login"><li><a>Sair</a></li></button>
                <div style="background-image: url(<?= $professor['foto_perfil'];  ?>);" onclick="redirecionar('perfilProfessor.php')" id="icone-perfil"></div>
            </div>

        </div>
        
    </header>

    <div id="menu-lateral">

        <div id="menu-navigation">
            <li><a href="calendarioProfessor.php">Calendário</a></li>
            <li><a href="presencaProfessor.php">Diário</a></li>
            <li><a href="consultaProfessor.php">Consulta</a></li>
            <li><a href="turmasProfessor.php">Turmas</a></li>
        </div>

    </div>
    
    <!-- PLUG-IN LIBRAS-->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>

    <!--JAVA LIBRAS-->
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    
    <?php if(!empty($flassMessage["msg"])): 

if($flassMessage["type"] == "success") {
    $type = "Sucesso";
}
else{
    $type = "Erro";
}
?>


<div class="toast active <?= $flassMessage["type"] ?>">
<div class="toast-content ">
    <i class="check <?= $type ?>"></i>
    <div class="message">
        <span class="text text-1"><?= $type ?></span>
        <span class="text text-2"><?= $flassMessage["msg"]; ?></span>
    </div>
</div>
<div class="close">&times;</div>
<div class="progress active"></div>
</div>
<?php $message->clearMessage(); // Limpa a mensagem após exibir ?>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmarSair() {
        Swal.fire({
            title: 'Tem certeza que deseja sair?',
            text: "Você será redirecionado para a página principal.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, sair!',
            cancelButtonText: 'Não, continuar',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            iconColor: '#FFC107', // Cor amarela para o ícone
            customClass: {
                popup: 'swal-custom-btn',  // Classe personalizada para o alerta
                confirmButton: 'swal-custom-btn', // Classe personalizada para o botão de confirmação
                cancelButton: 'swal-custom-btn'  // Classe personalizada para o botão de cancelamento
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Se o usuário confirmar, redireciona para a página de logout
                window.location.href = 'HomePage.php?logout=true';  // Altere para o URL de logout ou página inicial
            } else {
                // Se o usuário cancelar, exibe a mensagem "Você não foi desconectado."
                Swal.fire({
                    title: 'Continua na página!',
                    text: 'Você não foi desconectado.',
                    icon: 'info',
                    customClass: {
                        popup: 'swal-custom-btn', // Classe personalizada para o pop-up
                        title: 'swal-custom-btn', // Classe personalizada para o título
                        content: 'swal-custom-btn', // Classe personalizada para o conteúdo
                        confirmButton: 'swal-custom-btn'  // Classe personalizada para o botão de confirmação
                    }
                });
            }
        });
    }
</script>
