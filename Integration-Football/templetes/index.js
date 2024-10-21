var menuLateral = document.getElementById("menu-lateral");
var menuSanduiche = document.getElementById("menu-sanduiche");


function alterarMenu(){
    console.log("Função chamada");
    menuLateral .classList.toggle("abra");
    menuSanduiche.classList.toggle("abra");
}

function redirecionar(url){
    window.location.href = url;
}