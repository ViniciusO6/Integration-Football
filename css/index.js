let radio = document.querySelector('.manual-btn');
let cont = 1
let pressBtn = false;

document.getElementById('radio1').checked = true;

console.log('Hello, World');

function avancar(){
    if(cont >= 3){
        cont = 1;
        document.getElementById('radio'+cont).checked = true;
    }else{
    pressBtn = true;    
    cont++
    console.log('Apertou');
    document.getElementById('radio'+cont).checked = true;
    
    if(pressBtn){
        setTimeout(function(){
        pressBtn = false;
    }, 4000);
    }


 }
}

function voltar(){
    if(cont > 1){
        pressBtn = true;
        cont--;
        document.getElementById('radio'+cont).checked = true;
        console.log('Hello, World');
        if(pressBtn){
        setTimeout(function(){
            pressBtn = false;
        }, 4000);
    }
    }else{
        pressBtn = true;
        cont = 3;
        document.getElementById('radio'+cont).checked = true;
        if(pressBtn){
        setTimeout(function(){
            pressBtn = false;
        }, 4000);
    }
    }
}

setInterval(function(){
    if(pressBtn == false){
        proximaImg();
    }
}, 5000)

function proximaImg(){
    if(cont > 3){
        cont = 1;
    }else{
        cont++;
    }

    if(cont > 3){
        cont = 1;
    }

    document.getElementById('radio'+cont).checked = true;
}

function imagem(num){
    pressBtn = true;
    cont = num;
    if(pressBtn){
    setTimeout(function(){
        pressBtn = false;
    }, 4000);
}
}



//Avaliações



const esteira = document.getElementById('principal');
const perfil1 = document.getElementById('perfil1');
const perfil2 = document.getElementById('perfil2');
const perfil3 = document.getElementById('perfil3');
const perfil4 = document.getElementById('perfil4');
const perfil5 = document.getElementById('perfil5');
var marcador = 3;

//Determina de qual perfil ira iniciar
perfil3.classList.add('focus');





setInterval(function(){
    marcador++;
    if(marcador > 5){
        marcador = 1;
    }
    if(marcador == 1){
        esteira.style.marginLeft = "140%";
        perfil5.classList.remove('focus');
        perfil1.classList.add('focus');
        document.getElementById("comentario-perfil").innerText = "“Eu sempre tive receio de não conseguir acompanhar os treinos, mas aqui me sinto motivado e valorizado. A forma como a equipe promove a inclusão é incrível! Não importa o nível de habilidade, todos têm a chance de aprender e evoluir juntos. Isso me deu uma confiança que nunca tive antes.”"
    }
    if(marcador == 2){
        esteira.style.marginLeft = "70%";
        perfil1.classList.remove('focus');
        perfil2.classList.add('focus');
        document.getElementById("comentario-perfil").innerText = "“Nunca imaginei que encontraria um lugar onde realmente fosse valorizado como pessoa e atleta. A paciência e o suporte que recebo durante os treinos são surpreendentes. Os profissionais são comprometidos e têm uma paixão contagiante. A experiência aqui é sobre mais do que futebol: é sobre crescimento e amizade.”"
    }
    if(marcador == 3){
        esteira.style.marginLeft = "0%";
        perfil2.classList.remove('focus');
        perfil3.classList.add('focus');
        document.getElementById("comentario-perfil").innerText = "“Queria compartilhar minha experiencia incrivel com a instituição de futebol inclusivo. desde que comecei a participar, me senti parte de uma familia. A equipe é super acolhedora e os treinos são adaptados para todos, o que faz toda a diferença”"
    }
    if(marcador == 4){
        esteira.style.marginLeft = "-70%";
        perfil3.classList.remove('focus');
        perfil4.classList.add('focus');
        document.getElementById("comentario-perfil").innerText = "“Participar desta instituição de futebol foi uma das melhores decisões que já tomei. Desde o início, fui tratado com respeito e carinho. O ambiente é tão acolhedor que você se sente parte de um grande time. Os treinadores realmente entendem as necessidades de cada aluno e adaptam os treinos para que todos possam se desenvolver.”"
        
    }
    if(marcador == 5){
        esteira.style.marginLeft = "-140%";
        perfil4.classList.remove('focus');
        perfil5.classList.add('focus');
        document.getElementById("comentario-perfil").innerText = "“Meus filhos adoram participar desta instituição. Eles voltam para casa felizes, sempre contando histórias dos treinos e de como se divertiram com os colegas. É maravilhoso ver como o futebol pode ser ensinado de maneira inclusiva e lúdica. Como pai, fico tranquilo sabendo que eles estão em boas mãos.”"
    }

}, 5000)


