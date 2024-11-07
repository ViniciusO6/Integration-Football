<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templetes/menu.css">
    <link rel="stylesheet" href="templetes/footer.css">
    <link rel="icon" href="./Imagens/icon.jpeg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="Unidades.html">Unidades</a></li>
                    <li><a href="SobreNos.html">Sobre-nós</a></li>
                    <li><a href="Contato.php">Contato</a></li>

            </div>
        </div>


        <div id="part-2">
            <div id="navbar-part-2">
                <button onclick="redirecionar('Login.php')" style="cursor: pointer;" id="login"><li><a>Login</a></li></button>
                <button onclick="redirecionar('Cadastro.html')" style="cursor: pointer;" id="Matricule-se"><li><a>Matricule-se</a></li></button>
                
            </div>

        </div>
        
    </header>

    <div id="menu-lateral">

        <div id="menu-navigation">
            <li><a href="">Home</a></li>
            <li><a href="">Unidades</a></li>
            <li><a href="">Sobre-nós</a></li>
            <li><a href="Contato.php">Contato</a></li>
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
    
