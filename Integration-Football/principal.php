<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/alunocontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/turmacontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/atividadecontroller.php';


//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
  $imports =[
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
  ];
  $titulo = 'Login';
  $pageCSS = ["principal.css"];
  $pageJS = ["principal.js"];

  include_once('./templetes/headerAluno.php');

  $id = 4;

  $alunocontroller = new alunocontroller();
  $aluno = $alunocontroller->buscarPorId($id);

  $turmacontroller = new TurmaController();
  $turma = $turmacontroller->buscarPorId($aluno['id_turma']);

  $atividadecontroller = new AtividadeController();
  $atividades = $atividadecontroller->buscarAtividades($turma['id_turma']);
?>

<style>
<?php  
  foreach($atividades as $atividade){ 
    echo "
    
    .dia".$atividade['data_entrega']."{
        border-color: rgba(217, 162, 42, 1) !important;
      }

    ";
  } 
?>
</style>




<div class="container">
<div id="conteudo">
    <form id="form" action="">

        <div id="pricipal-calendario">
            <br>

            <div id="dia-semana">
            <div id="header-calendario">
                <h1 id="mes-ano">JANEIRO 2024</h1>
                <div id="btns">
                    <img src="./Imagens/seta-esquerda-black.svg" alt="" id="prev">
                    <img src="./Imagens/seta-direita-black.svg" alt="" id="next">
                </div>
            </div>
            <div id="semanas">
                <p>Domingo</p>
                <p>Segunda</p>
                <p>Terça</p>
                <p>Quarta</p>
                <p>Quinta</p>
                <p>Sexta</p>
                <p>Sabádo</p>
            </div>
            <div id="dias">
                </div>
            </div>
        </div>



        <h1 id="titulo">ATIVIDADES</h1>


        <?php
        
        
        $numeroAtividade = 1;
        foreach ($atividades as $atividade) {
        $numeroAtividade ++;
          ?>
        
        <div id="atividade<?=$numeroAtividade?>" class="atividade">     
          <div id="card-atividade" class="card-atividade" onclick="abrirPrevia('atividade<?=$numeroAtividade?>', 'card-arquivo<?=$numeroAtividade?>')">
            <div class="bloco1">
              <div class="icone-atividade">
                <img src="./Imagens/checklist.png" alt="">
              </div>
              
            </div>

            <div class="bloco2">
              <div class="titulo-atividade">
                <h3><?= $atividade['titulo_atividade'] ?></h3>
              </div>
            
              <div class="data-entrega">
                <img src="./Imagens/Time-Circle.png" alt=""><p><?= $hora = substr($atividade['hora_inicio'],0,-6); ?>h<?= $minutos = substr($atividade['hora_inicio'],3,-3); ?> ás <?= $hora = substr($atividade['hora_termino'],0,-6); ?>h<?= $minutos = substr($atividade['hora_termino'],3,-3); ?></p> 
              </div>
            </div>

            <div class="bloco3">
            <img src="./Imagens/arrow.png" alt="">
            <h3>DATA: <?php
              $data = $atividade['data_entrega'];
              $data = explode('-', $data);
              $dataDormatada = $data[2] . '/' . $data[1];
              



             ?>
             <?=
             $dataDormatada;
             ?>
             
            </h3>
          
          </div>
     
     
        </div>
      
      <div id="card-arquivo<?=$numeroAtividade?>" class="card-arquivo fechado">
            <div class="arquivo">
              <div class="previa-arquivo">
                <img src="./Imagens/pdfIcon.png" alt="">
                <p>Arquivo 1- "Histotia do Power Soccer"</p>
              </div>
              <button>Baixar Arquivos</button>
              
            </div>
          </div>
      </div>

      <?php }?>

      

    </form>
    
  </div>
</div>






<?php 
  include_once('./templetes/footer.php');
?>




 