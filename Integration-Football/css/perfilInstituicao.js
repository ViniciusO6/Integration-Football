document.getElementById("btn-editar-foto").addEventListener("click", function () {
  console.log("Clicou")
  document.getElementById("input-file").click();
});


document.getElementById("input-file").addEventListener("change", function () {
  let file = document.getElementById("input-file").files[0];
  let fileText = document.getElementById("file-text");
  let cancelarBtn = document.getElementById("cancelar");
  let FotoPerfil = document.getElementById("foto-perfil");
  let btns = document.getElementById("btns-foto-perfil") ;

  btns.classList.toggle('invisivel');
  

  if (file) {
    const reader = new FileReader(); // Cria um leitor de arquivos

    reader.onload = (e) => {
        FotoPerfil.style.backgroundImage = "url("+ e.target.result +")"; // Define a imagem como a URL gerada
        FotoPerfil.style.display = 'block'; // Exibe a imagem
    };

    reader.readAsDataURL(file); // Lê o arquivo como uma URL base64
}



  console.log(file)
  console.log(fileText)
  console.log(cancelarBtn)

})

// Fim Ação do botão de trocar foto de perfil
document.getElementById('input-file').addEventListener('change', function() {
    var file = document.getElementById('input-file').files[0];

if(file) {
    document.getElementById('file-text').innerHTML = file.name;
} else {
    document.getElementById('fileName').textContent = '';
}});


document.getElementById('icon-olho-1').addEventListener('click', function() {
    var passwordField = document.getElementById('input-senha');
    var olho = document.getElementById('icon-olho-1');
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      olho.src = './Imagens/icones/visibility.svg'
    } else {
      passwordField.type = 'password';
      olho.src = './Imagens/icones/visibility_off.svg';
    }
  });

  document.getElementById('icon-olho-2').addEventListener('click', function() {
    var passwordField = document.getElementById('input-nova-senha');
    var olho = document.getElementById('icon-olho-2');
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      olho.src = './Imagens/icones/visibility.svg'
    } else {
      passwordField.type = 'password';
      olho.src = './Imagens/icones/visibility_off.svg';
    }
  });

  document.getElementById('icon-olho-3').addEventListener('click', function() {
    var passwordField = document.getElementById('input-confirme-senha');
    var olho = document.getElementById('icon-olho-3');
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      olho.src = './Imagens/icones/visibility.svg'
    } else {
      passwordField.type = 'password';
      olho.src = './Imagens/icones/visibility_off.svg';
    }
  });

  function fecharTela(){
    const tela = document.getElementById('redefinir-senha');
    const sombra = document.getElementById('sombra');

    document.getElementById('input-confirme-senha').value = "";
    document.getElementById('input-nova-senha').value = "";
    document.getElementById('input-senha').value = "";
    
    tela.classList.toggle('invisivel');
    sombra.classList.toggle('invisivel');
  }

  function validarCampos(){
    const confirmeSenhaAtual = document.getElementById('input-senha').value;
    const novaSenha = document.getElementById('input-nova-senha').value;
    const confirmeNovaSenha = document.getElementById('input-confirme-senha').value;
    const senhaAtual = document.getElementById('senha-atual').value;
    if(senhaAtual == confirmeSenhaAtual ){
      document.getElementById('input-senha').style.border = "solid 2px #07cb65";
        if(novaSenha == confirmeNovaSenha){
          document.getElementById('input-confirme-senha').style.border = "solid 2px #07cb65";
            return true;
            }else{
            document.getElementById('erroSenha').innerHTML = "As senhas digitadas não são iguais. Verifique e tente novamente."
            document.getElementById('erroSenha').classList.remove("invisivel");
            document.getElementById('redefinir-senha').style.height = 315+'px';
            document.getElementById('input-confirme-senha').style.border = "solid 2px red";
            return false;
            }
    }else{
        document.getElementById('erroSenha').innerHTML = "Senha incorreta, verifique e tente novamente.";
        document.getElementById('input-confirme-senha').style.border = "solid 2px #07cb65";
        document.getElementById('erroSenha').classList.remove("invisivel");
        document.getElementById('redefinir-senha').style.height = 315+'px';
        document.getElementById('input-senha').style.border = "solid 2px red";
        return false;
    }  
}
  