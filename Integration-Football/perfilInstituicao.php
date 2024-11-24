<?php 
  $imports =[
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
  ];
  $titulo = 'Perfil da Instituição';
  $pageCSS = ["perfilInstituicao.css"];
  $pageJS = ["perfilInstituicao.js"];
  include_once('./templetes/headerInstituicao.php');
  ?>
<div class="container">
  <div id="perfil">
    

    <form id="form" action="">
        <h1 id="titulo">Meu Perfil</h1>
        <div id="informacoes"> 


            <div id="bloco1">
                
                <label for="input-matricula">Matricula</label>
                <input id="input-matricula" type="text" name="matricula" value="<?= $aluno['id_aluno'] ?>" disabled>

                <label for="input-nome">Nome</label>
                <input id="input-nome" type="text" name="nome" value="<?= $aluno['nome_aluno'] ?>" disabled>

                <div id="modalidade-turma">
                    <div id="turma">
                        <label for="input-turma">Turma</label>
                        <input id="input-turma" type="text" value="<?= $turma['nome_turma'] ?>" disabled>
                    </div>
                    
                    
                </div>

                <label for="input-email">E-mail</label>
                <input disabled id="input-email" type="text" value="<?= $aluno['email_aluno'] ?>">

                <label for="input-senha">Senha</label>
                <input disabled id="senha" type="password" value="<?= $aluno['senha'] ?>">

                <button onclick="fecharTela()" id="btn-enviar" type="button">Alterar Senha</button>
            </div>

            <div id="bloco2">
                <div id="foto-perfil">
                    <button type="button" onclick="file()" id="btn-editar-foto"> <img src="./Imagens/editar.png" alt=""> </button>
                    <input id="input-file" style="display: none;" type="file" name="foto">
                </div>

            </div>
        </div>    
    </form>   
  </div>

<br><br><br><br><br>


<div class="invisivel" id="redefinir-senha">
  <form onsubmit="return validarCampos()" action="./controller/alunocontroller.php" method="post">
    <h1>Redefinir Senha</h1>
    
    
    <img id="icon-olho-1" src="./Imagens/icones/visibility_off.svg" alt="">
    <img id="icon-olho-2" src="./Imagens/icones/visibility_off.svg" alt="">
    <img id="icon-olho-3" src="./Imagens/icones/visibility_off.svg" alt="">

    <label for="input-senha">Digite sua senha atual</label>
    <input name="input-senha" id="input-senha" type="password" value="" required autocomplete="off">
    <p class="invisivel" id="erroSenhaAtual">Senha incorreta, tente novamente.</p>

    <label for="input-nova-senha">Digite sua nova senha</label>
    <input name="input-nova-senha" id="input-nova-senha" type="password" value="" required autocomplete="off">

    <label for="input-confirme-senha">Confirme sua nova senha</label>
                    
    <input name="senha" id="input-confirme-senha" type="password" value="" required autocomplete="off">
        <p class="invisivel" id="erroSenha">As senhas digitadas não são iguais. Verifique e tente novamente.</p>

    <div id="btns-redefinir">

      <input type="hidden" name="crud" value="alterarSenha">
      <input name="id" type="hidden" value="<?= $id ?>">
      <input id="senha-atual" name="senha-atual" type="hidden" value="<?= $aluno['senha'] ?>">

      <button onclick="fecharTela()" id="btn-confirmar" type="button">Cancelar</button>
      <button id="btn-cancelar" type="submit">Redefinir Senha</button>
    </div>

  </form>

</div>
<div class="invisivel" id="sombra"></div>
</div>
    
</div>





<?php 
  include_once('./templetes/footer.php');
?>