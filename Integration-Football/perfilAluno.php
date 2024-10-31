<?php 

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
require_once $_SERVER['DOCUMENT_ROOT'].'/Integration-Football/Integration-Football/controller/alunocontroller.php';

  $imports =[
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
  ];
  $titulo = 'Meu Perfil';
  $pageCSS = ["perfilAluno.css"];
  $pageJS = ["perfilAluno.js"];

  include_once('./templetes/menu.php');

  $id = 1;

  $alunocontroller = new alunocontroller();
  $aluno = $alunocontroller->buscarPorId($id);

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
                    <div id="modalidade">
                        <label for="input-modalidade">Modalidade</label>
                        <input id="input-modalidade" type="text" disabled>
                    </div>

                    <div id="turma">
                        <label for="input-turma">Turma</label>
                        <input id="input-turma" type="text" disabled>
                    </div>
                    
                    
                </div>

                <label for="input-professor">Professor Correspondente</label>
                <input id="input-professor" type="text" disabled>

                <label for="input-email">E-mail</label>
                <input id="input-email" type="text" value="<?= $aluno['email_aluno'] ?>">

                <label for="input-senha">Senha</label>
                <input id="input-senha" type="text" value="<?= $aluno['senha'] ?>">

                <button id="btn-enviar" type="submit">Editar Dados</button>
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
    
</div>





<?php 
  include_once('./templetes/footer.php');
?>




 