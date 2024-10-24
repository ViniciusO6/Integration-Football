<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="templetes/footer.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="templetes/index.js" defer></script>
    <title><?= $titulo ?></title>

    <?php 
    // Incluindo CSS e JS adicionais
    if (isset($pageJS) && is_array($pageJS)) {
        foreach ($pageJS as $jsFile) {
            echo '<script src="css/' . $jsFile . '" defer></script>';
        }
    }

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
            <button id="menu-sanduiche" onclick="toggleMenu()"></button>
            <img id="logo" src="templetes/logonova.png" alt="Logo">
            <div id="navbar-part-1">
                <li><a href="index.html">Home</a></li>
                <li><a href="Unidades.html">Unidades</a></li>
                <li><a href="SobreNos.html">Sobre-nós</a></li>
                <li><a href="Contato.php">Contato</a></li>
            </div>
        </div>

        <div id="part-2">
            <div id="navbar-part-2">
                <button onclick="redirecionar('login-duda.php')" id="login">Login</button>
                <button onclick="redirecionar('cadastro.php')" id="Matricule-se">Matricule-se</button>
            </div>
        </div>

        <!-- Menu Lateral -->
        <div id="menu-lateral">
            <ul>
            <li><a href="index.html">Home</a></li>
                <li><a href="Unidades.html">Unidades</a></li>
                <li><a href="SobreNos.html">Sobre-nós</a></li>
                <li><a href="Contato.php">Contato</a></li>
            </ul>
        </div>
    </header>

    <script>
        function toggleMenu() {
            const menuLateral = document.getElementById('menu-lateral');
            menuLateral.classList.toggle('abra');
        }

        function redirecionar(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>
