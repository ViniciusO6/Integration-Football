<?php

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

?>

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
                    <select id="inserir_dados">
                        <option value="" disabled selected hidden></option>
                        <option>Modalidade 1</option>
                        <option>Modalidade 2</option>
                        <option>Modalidade 3</option>
                        <option>Modalidade 4</option>
                    </select>
                </div>
                <!-- Final ComboBox1-->



                <!-- Div do ComboBox2  -->
                <div class="ComboBox">
                    <p class="titulo">Escolha a turma:</p>
                    <select id="inserir_dados">
                        <option value="" disabled selected hidden></option>
                        <option>Turma 1</option>
                        <option>Turma 2</option>
                        <option>Turma 3</option>
                        <option>Turma 4</option>
                    </select>
                </div>
                <!-- Final ComboBox2 -->
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