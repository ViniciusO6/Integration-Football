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
  $titulo = 'Professores';
  $pageCSS = ["professores.css"];
  $pageJS = ["consulta.js"];

  include_once('./templetes/menu.php');

?>

<div class="container">
  <div id="consulta">
    

    <form id="form" action="">
        <h1 id="titulo">PROFESSORES</h1>


        <div id="th">
            <div id="th-esquerda">
                <h3>Professor/Organizador</h3>
            </div>

            <div class="separador-vertical"></div>

            <div id="th-direita">
                <h3>E-mail para contato</h3>
            </div>            
        </div>

        <!-- TABLE -->

        <div id="table">
            <div id="nomes-professores">
            <?php
                    $alunocontroller = new alunocontroller();
                    $alunos = $alunocontroller->listar();
                    foreach($alunos as $aluno){
                    ?>
                        <div id="tr-nome">
                            <p><?= $aluno['nome_aluno'];?></p>
                            <div class="separador-horizontal"></div>
                        </div>
                    <?php } ?>
            </div>
            
            <div class="separador-vertical"></div>

            <div id="contato-professores">
        
                

<?php
                    $alunocontroller = new alunocontroller();
                    $alunos = $alunocontroller->listar();
                    foreach($alunos as $aluno){
                    ?>
                        <div id="tr-nome">
                            <p><?= $aluno['email_aluno'];?></p>
                            <div class="separador-horizontal"></div>
                        </div>
                    <?php } ?>
   

            </div>

        </div>

        <br><br>

        <h1 id="titulo">ALUNOS</h1>


        <div id="th">
            <div id="th-esquerda">
                <h3>Alunos</h3>
            </div>

            <div class="separador-vertical"></div>

            <div id="th-direita">
                <h3>E-mail para contato</h3>
            </div>            
        </div>

        <div id="table">
            <div id="nomes-professores">

                    <?php
                    $alunocontroller = new alunocontroller();
                    $alunos = $alunocontroller->listar();
                    foreach($alunos as $aluno){
                    ?>
                        <div id="tr-nome">
                            <p><?= $aluno['nome_aluno'];?></p>
                            <div class="separador-horizontal"></div>
                        </div>
                    <?php } ?>
            </div>
            
            <div class="separador-vertical"></div>

            <div id="contato-professores">
            <?php
                    foreach($alunos as $aluno){
                    ?>

                    <div id="tr-nome">
                        <p><?= $aluno['email_aluno'];?></p>
                        <div class="separador-horizontal"></div>
                    </div>

                    <?php } ?>
            

            </div>
        </div>      
    </form>   
  </div>

<br><br><br><br><br>
    
</div>





<?php 
  include_once('./templetes/footer.php');
?>




 