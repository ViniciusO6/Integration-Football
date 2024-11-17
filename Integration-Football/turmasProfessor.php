<?php
require_once './controller/alunocontroller.php';
require_once './controller/professorcontroller.php';
require_once './controller/turmacontroller.php';
require_once './controller/modalidadecontroller.php';


//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
$imports = [
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Turmas | Professor';
$pageCSS = ["turmasprofessores.css"];
$pageJS = ["consulta.js"];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_modalidade = $_POST['modalidade'];
    $turmacontroller = new turmacontroller();
    print_r($id_modalidade);
}


include_once('./templetes/headerProfessor.php');

$id = 5;
?>


<script>
    function enviarModalidade() {

        var modalidade = document.getElementById("select-modalidade").value;
        let tipo = "buscarTurmas";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./ajax/ajax.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send("modalidade=" + modalidade + "&tipo=" + tipo);


        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById("select-turma").innerHTML = xhr.responseText;
            }
        };
    }

    function filtrar() {
        let tipo = "filtrar";

        var modalidade = document.getElementById("select-modalidade").value;
        var turma = document.getElementById("select-turma").value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./ajax/ajax.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Envia o valor do select (modalidade) para o PHP
        xhr.send("modalidade=" + modalidade + "&turma=" + turma + "&tipo=" + tipo);

        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById("nomes-alunos").innerHTML = xhr.responseText;
            }
        };

        setTimeout(function() {
            tipo = "carregarEmail";

            var modalidade = document.getElementById("select-modalidade").value;
            var turma = document.getElementById("select-turma").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./ajax/ajax.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.send("modalidade=" + modalidade + "&turma=" + turma + "&tipo=" + tipo);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("contato-alunos").innerHTML = xhr.responseText;
                }
            };

        }, 1)

        setTimeout(function() {
            let tipo = "carregarNomeTurma";

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "./ajax/ajax.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.send("modalidade=" + modalidade + "&turma=" + turma + "&tipo=" + tipo);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById("Turma").innerHTML = xhr.responseText;
                }
            };

        }, 1)


    }

    function carregarNomeTurma() {
        let tipo = "carregarNomeTurma";

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./ajax/ajax.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("modalidade=" + modalidade + "&turma=" + turma + "&tipo=" + tipo);

        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById("Turma").innerHTML = xhr.responseText;
            }
        };
    }
</script>

<?php

?>






<div class="container">
    <div id="consulta">


        <div id="form" action="">
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
                <div class="nomes-table " id="nomes-professores">
                    <?php
                    $professorcontroller = new professorcontroller();
                    $professores = $professorcontroller->listar();
                    foreach ($professores as $professor) {
                    ?>
                        <div id="tr-nome">
                            <p><?= $professor['nome_professor']; ?></p>
                            <div class="separador-horizontal"></div>
                        </div>
                    <?php } ?>
                </div>

                <div class="separador-vertical"></div>

                <div class="contatos" id="contato-professores">



                    <?php
                    foreach ($professores as $professor) {
                    ?>
                        <div id="tr-nome">
                            <p><?= $professor['email_professor']; ?></p>
                            <div class="separador-horizontal"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <br><br>

            <h1 id="titulo">ALUNOS</h1>
            <form id="form-filtro">
                <?php
                $modalidadecontroller = new modalidadecontroller();
                $modalidades = $modalidadecontroller->listarPorIdProfessor($id);
                ?>
                <select required name="modalidade" id="select-modalidade" onChange="enviarModalidade()">
                    <option value="" disabled selected hidden>Escolha uma modalidade</option>
                    <?php
                    $i = 0;
                    foreach ($modalidades as $modalidade) {
                        $i++;
                        echo "<option id='" . $i . "' value='" . $modalidade['id'] . "'>" . htmlspecialchars($modalidade['nome_modalidade']) . "</option>";
                    }
                    ?>
                </select>
                <select require name="turma" id="select-turma" onChange="">
                    <option value="0" disabled selected hidden>Escolha uma turma</option>

                </select>
                <button class="filtrar" onclick="filtrar()" type="button">Filtrar</button>

            </form>
            <br>


            <div id="th">
                <div id="th-esquerda">
                    <h3>Alunos</h3>
                </div>

                <div class="separador-vertical"></div>

                <div id="th-centro">
                    <h3>Turma</h3>
                </div>

                <div class="separador-vertical"></div>

                <div id="th-direita">
                    <h3>E-mail</h3>
                </div>
            </div>


            <div id="table">
                <!-- nome dos alunos -->
                <div class="nomes-table " id="nomes-alunos">
                    <?php
                    $alunocontroller = new alunocontroller();
                    $alunos = $alunocontroller->listar();
                    foreach ($alunos as $aluno) {
                    ?>
                        <div id="tr-nome">
                            <p><?= $aluno['nome_aluno']; ?></p>
                            <div class="separador-horizontal"></div>
                        </div>
                    <?php } ?>
                </div>

                <div class="separador-vertical"></div>

                <!-- Nome da turma -->
                <div id="Turma">
                    <?php
                    $turmacontroller = new TurmaController();
                    $alunocontroller = new alunocontroller();
                    $alunos = $alunocontroller->listar();


                    foreach ($alunos as $aluno) {
                        $turma = $turmacontroller->buscarTurma($aluno['id_turma']);
                        foreach ($turma as $turmas) {
                    ?>
                            <div id="tr-nome">
                                <p><?= $turmas['nome_turma']; ?></p>
                                <div class="separador-horizontal"></div>
                            </div>
                    <?php }
                    } ?>
                </div>

                <div class="separador-vertical"></div>

                <div class="contatos" id="contato-alunos">
                    <div class="nomes-table " id="nomes-alunos">
                        <?php
                        $alunocontroller = new alunocontroller();
                        $alunos = $alunocontroller->listar();
                        foreach ($alunos as $aluno) {
                        ?>
                            <div id="tr-nome">
                                <p><?= $aluno['email_aluno']; ?></p>
                                <div class="separador-horizontal"></div>
                            </div>
                        <?php } ?>
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
