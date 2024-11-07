<?php
// Os imports são usados para adicionar links de fontes e bibliotecas externas no HTML
// No caso, estão substituindo as tradicionais tags <link rel="stylesheet">
$imports = [
  "https://fonts.gstatic.com/", // Link necessário para funcionar fontes do Google
  "https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"

];

// Variáveis que armazenam o título da página, os arquivos CSS e JS específicos da página
$titulo = 'Unidade'; // Título da página

$pageJS = ["index.js"]; // Arquivo JS específico da página
$pageCSS = ["unidades.css"]; // Arquivo CSS dos Cards


// Inclui o arquivo index.php que contém a estrutura base da página
include_once('./templetes/menu.php');
?>

<div class="container">
    <div class="card">
        <h1>UNIDADES</h1>
        <p>Busque a unidade Integration Football mais próxima de você, fornecendo algumas informações solicitadas a seguir:</p>
        <img src="Imagens/Unidades/globo-terrestre.png">
        <div class="buscar">
            <p>Digite o seu CEP para encontrar a unidade mais próxima:</p>
            <input type="text" class="text-input" placeholder="Digite aqui..." />
            <div class="botao">
                <button class="blue-button" onclick="showCards()">BUSCAR</button>
            </div>
        </div>

        <div class="mapbox">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3656.762520413028!2d-46.641981725020386!3d-23.576971162165115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-PT!2sbr!4v1729661123054!5m2!1spt-PT!2sbr" width="1200" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        
     </div>
    </div><!-- Fecha o card -->

    <div class ="uni">

    <h1 class="titulo-uni">UNIDADES CORRESPONDENTES:</h1>


    <div class="unidades">

        <div class="card-unidades">
            <div class="card-uni1">
                <h2>ITAIM BIBI</h2>
                <p>Endereço: Rua Apeninos, 1063 - São Paulo, SP<br>Telefone: 2048-1510<br>E-mail: integrationfootbal.itaimbibi@gmail.com</p>
                <button class="button1"onclick="showMap_itaim()">Visualizar</button>
            </div>

            <div class="card-uni2">
                <h2>SANTANA</h2>
                <p>Endereço: Rua Embaixador João Neves Fountoura, 645 - São Paulo, SP<br>Telefone: 2048-4567<br>E-mail: integrationfootbal.santana@gmail.com</p>
                <button class="button2" onclick="showMap_santana()">Visualizar</button>
            </div>

            <div class="card-uni3">
                <h2>IPIRANGA</h2>
                <p>Endereço: Rua Xavier de Almeida, 12 - São Paulo, SP<br>Telefone: 2048-2453<br>E-mail: integrationfootbal.ipiranga@gmail.com</p>

                <button class="button3" onclick="showMap_ipiranga()">Visualizar</button>

                </div>

                </div>

        </div><!-- Fecha card-unidades -->

    </div><!-- Fecha unidades -->
    </div><!-- Fecha container -->

    <?php
// Inclui o arquivo do rodapé (footer.php)
include_once('./templetes/footer.php');
?>


<script>
    function showCards() {
        var unidadesDiv = document.querySelector('.unidades');
        unidadesDiv.style.display = 'block'; // Exibe os cards
    }

</script>

<script>

function showMap_itaim() {
    // Esconder o mapa atual
    const mapbox = document.querySelector('.mapbox');
    mapbox.style.display = 'none'; // Esconde o mapa atual

    // Criar um novo iframe para o novo mapa
    const newMapbox = document.createElement('iframe');
    newMapbox.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.762520413028!2d-46.641981725020386!3d-23.576971162165115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce599ae3fa0d51%3A0x63d03abb22ac44f5!2sR.%20Apeninos%2C%201063%20-%20Vila%20Mariana%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004104-021!5e0!3m2!1spt-BR!2sbr!4v1729739835625!5m2!1spt-BR!2sbr";
    newMapbox.width = "1200"; // Largura do novo mapa
    newMapbox.height = "550"; // Altura do novo mapa
    newMapbox.style.border = "0"; // Estilo da borda
    newMapbox.allowFullscreen = ""; // Permitir tela cheia
    newMapbox.loading = "fast"; // Carregamento preguiçoso
    newMapbox.referrerPolicy = "no-referrer-when-downgrade"; // Política de referência

    // Adiciona o novo mapa ao DOM
    const container = document.querySelector('.mapbox');
    container.innerHTML = ''; // Limpa o conteúdo atual
    container.appendChild(newMapbox); // Adiciona o novo mapa
    container.style.display = 'block'; // Exibe o novo mapa
}

function showMap_santana() {
    // Esconder o mapa atual
    const mapbox = document.querySelector('.mapbox');
    mapbox.style.display = 'none'; // Esconde o mapa atual

    // Criar um novo iframe para o novo mapa
    const newMapbox = document.createElement('iframe');
    newMapbox.src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.838505857759!2d-46.63632912502329!3d-23.502325659425356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef7d2f2049b4d%3A0xb86e03f1dcda2b94!2sR.%20Emb.%20Jo%C3%A3o%20Neves%20da%20Fontoura%20-%20Santana%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2002013-040!5e0!3m2!1spt-BR!2sbr!4v1729740052196!5m2!1spt-BR!2sbr";
    newMapbox.width = "1200"; // Largura do novo mapa
    newMapbox.height = "550"; // Altura do novo mapa
    newMapbox.style.border = "0"; // Estilo da borda
    newMapbox.allowFullscreen = ""; // Permitir tela cheia
    newMapbox.loading = "fast"; // Carregamento preguiçoso
    newMapbox.referrerPolicy = "no-referrer-when-downgrade"; // Política de referência

    // Adiciona o novo mapa ao DOM
    const container = document.querySelector('.mapbox');
    container.innerHTML = ''; // Limpa o conteúdo atual
    container.appendChild(newMapbox); // Adiciona o novo mapa
    container.style.display = 'block'; // Exibe o novo mapa
}

function showMap_ipiranga() {
    // Esconder o mapa atual
    const mapbox = document.querySelector('.mapbox');
    mapbox.style.display = 'none'; // Esconde o mapa atual

    // Criar um novo iframe para o novo mapa
    const newMapbox = document.createElement('iframe');
    newMapbox.src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.51033134175!2d-46.61124162502013!3d-23.586023862497974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5be613fd92b5%3A0xf8a5e44d22a83687!2sR.%20Xavier%20de%20Almeida%2C%2012%20-%20Ipiranga%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004211-000!5e0!3m2!1spt-BR!2sbr!4v1729740207869!5m2!1spt-BR!2sbr";
    newMapbox.width = "1200"; // Largura do novo mapa
    newMapbox.height = "550"; // Altura do novo mapa
    newMapbox.style.border = "0"; // Estilo da borda
    newMapbox.allowFullscreen = ""; // Permitir tela cheia
    newMapbox.loading = "fast"; // Carregamento preguiçoso
    newMapbox.referrerPolicy = "no-referrer-when-downgrade"; // Política de referência

    // Adiciona o novo mapa ao DOM
    const container = document.querySelector('.mapbox');
    container.innerHTML = ''; // Limpa o conteúdo atual
    container.appendChild(newMapbox); // Adiciona o novo mapa
    container.style.display = 'block'; // Exibe o novo mapa
}

</script>



