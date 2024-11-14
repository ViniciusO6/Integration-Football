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
    const novaSenha = document.getElementById('input-nova-senha').value;
    const confirmeNovaSenha = document.getElementById('input-confirme-senha').value;

    if(novaSenha == confirmeNovaSenha){
      return true;

    }else{
      return false;
    }

    

  }
  