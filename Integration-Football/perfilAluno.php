<?php 
require_once './config/globals.php';
//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
require_once $_SERVER['DOCUMENT_ROOT'].'/Integration-Football-main/Integration-Football/controller/alunocontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Integration-Football-main/Integration-Football/controller/professorcontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Integration-Football-main/Integration-Football/controller/turmacontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Integration-Football-main/Integration-Football/controller/modalidadecontroller.php';


  $imports =[
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
  ];
  $titulo = 'Meu Perfil';
  $pageCSS = ["perfilAluno.css"];
  $pageJS = ["perfilAluno.js"];



  $id = $_SESSION["id"];

  $alunocontroller = new alunocontroller();
  $aluno = $alunocontroller->buscarPorId($id);

  $turmacontroller = new TurmaController();
  $turma = $turmacontroller->buscarPorId($aluno['id_turma']);

  $professorcontroller = new ProfessorController();
  $professor = $professorcontroller->buscarPorId($turma['id_professor']);

  $modalidadecontroller = new ModalidadeController();
  $modalidade = $modalidadecontroller->buscarPorId($turma['id_modalidade']);
  
  include_once('./templetes/headerAluno.php');



?>

<div class="container">
  <div id="perfil">
    

    <div id="form">
        <h1 id="titulo">Meu Perfil</h1>
        <div id="informacoes"> 


            <div id="bloco1">
                
                <label for="input-matricula">Matricula</label>
                <input id="input-matricula" type="text" name="matricula" value="<?= $aluno['id_aluno'] ?>" disabled>

                <label for="input-nome">Nome</label>
                <input id="input-nome" type="text" name="nome" value="<?= $aluno['nome_aluno'] ?>" disabled>

                <div id="modalidade-turma">
                    <div id="modalidade">
                        <label for="input-modalidade">Modalidade</label>
                        <input id="input-modalidade" type="text" disabled  value="<?= $modalidade['nome_modalidade'] ?>">
                    </div>

                    <div id="turma">
                        <label for="input-turma">Turma</label>
                        <input id="input-turma" type="text" value="<?= $turma['nome_turma'] ?>" disabled>
                    </div>
                    
                    
                </div>

                <label for="input-professor">Professor Correspondente</label>
                <input id="input-professor"  type="text" value="<?= $professor['nome_professor'] ?>"  disabled>

                <label for="input-email">E-mail</label>
                <input disabled id="input-email" type="text" value="<?= $aluno['email_aluno'] ?>">

                <label for="input-senha">Senha</label>
                <input disabled id="senha" type="password" value="<?= $aluno['senha'] ?>">

                <button onclick="fecharTela()" id="btn-enviar" type="button">Alterar Senha</button>
            </div>

            <div id="bloco2">
          <form action="./controller/alunocontroller.php" method="POST" enctype="multipart/form-data">
          <div style="background-image: url(<?= $aluno['foto_perfil'];  ?>);" id="foto-perfil">
            <button type="button" onclick="" id="btn-editar-foto"> <img src="./Imagens/editar.png" alt="" draggable="false"> </button>
            <input id="input-file" style="display: none;" type="file" name="foto_perfil" accept=".png, .jpg, .jpeg">
            <div class="invisivel" id="btns-foto-perfil">
              <button name="crud" value="AtualizarFoto" id="btn-salvar-foto" type="submit">Salvar</button>

            </div>
            
          </div>
          </form>
        </div>
        </div>    
</div>   
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
      <input id="senha-atual" name="senha-atual" type="hidden" value="<?=  str_repeat("#", strlen($aluno['senha'] )) ?>">

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




 
