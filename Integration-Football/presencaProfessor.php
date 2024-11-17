<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/alunocontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/professorcontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/turmacontroller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Integration-Football/Integration-Football/controller/modalidadecontroller.php';

//Os imports subistituem os ( <link rel="stylesheet" href="/meu-projeto/css/styles.css">  )
//Basta colocar os links
$imports = [
    "https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css",
    "https://fonts.gstatic.com/",
    "https://fonts.googleapis.com/css2?family=Barlow&family=Teko:wght@300&display=swap"
];
$titulo = 'Consulta';
$pageCSS = ["presençaProfessor.css"];
$pageJS = ["presençaProfessor.js"];

include_once('./templetes/headerProfessor.php');

$id = 5

?>


<script>
    function enviarModalidade() {
        console.log("chamou");
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
</script>

<div class="container">
    <div id="consulta">

        <!-- Form para enviar as informações sobre a aula -->
        <form id="form" action="">
            <h1 id="titulo">PRESENÇA</h1>

            <!-- Div que guarda os ComboBox de Modalidade e Professor -->
            <div class="Pesquisar">

                <!-- Div do ComboBox1  -->
                <div class="ComboBox">
                    <p class="titulo">Escolha a modalidade:</p>
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



                </div>
                <!-- Final ComboBox1-->



                <!-- Div do ComboBox2  -->
                <div class="ComboBox">
                    <p class="titulo">Escolha a turma:</p>
                    <select require name="turma" id="select-turma" onChange="">
                        <option value="0" disabled selected hidden>Escolha uma turma</option>

                    </select>
                </div>
                <!-- Final ComboBox2 -->

                <button class="filtrar" onclick="filtrar()" type="button">Filtrar</button>
            </div>
            <!-- Final Pesquisar-->

            <p class="titulo">Defina a data :</p>
            <input id="input-data" type="date">

            <p class="titulo">Descrição da Aula:</p>
            <textarea name="descricao" id="input-descricao" placeholder="Escreva uma descrição de até 255 caracteres."></textarea>

            <h1 id="titulo">ALUNOS</h1>

            <!-- Tabela de Presença -->
            <div id="table">

                <!-- Coluna da Esquerda que contem os nomes -->
                <div id="nomes-alunos">
                    <div id="tr-nome">

                    </div>

                    <div id="tr-nome">
                        <p>Lucas Henrique Pereira Souza</p>
                        <div class="separador-horizontal"></div>
                    </div>

                    <div id="tr-nome">
                        <p>Ana Beatriz Mendes Ferreira</p>
                        <div class="separador-horizontal"></div>
                    </div>

                    <div id="tr-nome">
                        <p>Gabriel Eduardo Ramos Oliveira</p>
                        <div class="separador-horizontal"></div>
                    </div>

                    <div id="tr-nome">
                        <p>Pedro Lucas Marins Golçalves</p>
                        <div class="separador-horizontal"></div>
                    </div>
                </div>
                <!-- Fim Coluna da Esquerda -->

                <div class="separador-vertical"></div>

                <!-- Coluna da direita que contém os nomes -->

                <div id="checklist">
                    <div id="tr-nome" class="TituloDireita">
                        <p>Presente</p>
                    </div>

                    <div id="tr-nome">
                        <input type="checkbox" class="input-checkbox" name="1" id="" onclick="selectOnlyThis(this, 1)">
                    </div>

                    <div id="tr-nome">
                        <input type="checkbox" class="input-checkbox" name="2" id="" onclick="selectOnlyThis(this, 2)">
                    </div>

                    <div id="tr-nome">
                        <input type="checkbox" class="input-checkbox" name="3" id="" onclick="selectOnlyThis(this, 3)">
                    </div>

                    <div id="tr-nome">
                        <input type="checkbox" class="input-checkbox" name="4" id="" onclick="selectOnlyThis(this, 4)">
                    </div>
                </div>
                <!--Fim Coluna da direita -->

                <div class="separador-vertical"></div>

                <div id="checklist">
                    <div id="tr-nome" class="TituloDireita">
                        <p>Ausente</p>
                    </div>

                    <div id="tr-nome">
                        <input type="checkbox" class="input-checkbox" name="1" id="" onclick="selectOnlyThis(this, 1)">
                    </div>

                    <div id="tr-nome">
                        <input type="checkbox" class="input-checkbox" name="2" id="" onclick="selectOnlyThis(this, 2)">
                    </div>

                    <div id="tr-nome">
                        <input type="checkbox" class="input-checkbox" name="3" id="" onclick="selectOnlyThis(this, 3)">
                    </div>

                    <div id="tr-nome">
                        <input type="checkbox" class="input-checkbox" name="4" id="" onclick="selectOnlyThis(this, 4)">
                    </div>
                </div>

            </div>
            <!-- Fim Tabela de Presença -->

            <!-- Div que contem o botão para enviar o form -->
            <div class=" btns">
                <button id="btn-enviar" type="submit">Computar</button>
            </div>
            <!-- Fim -->

        </form>
        <!-- Fim do Form -->

    </div>


    <br>



</div>





<?php
include_once('./templetes/footer.php');
?>