<?php

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

include_once('./templetes/headerProfessor.php');

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

                <div class="separador-vertical"></div>

                <div id="contato-professores">
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

            </div>

            <br><br>

            <h1 id="titulo">ALUNOS</h1>


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
                <div id="nomes-professores">
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

                <div class="separador-vertical"></div>

                <div id="Turma">
                    <div id="tr-nome">
                        <p>Turma A</p>
                        <div class="separador-horizontal"></div>
                    </div>

                    <div id="tr-nome">
                        <p>Turma B</p>
                        <div class="separador-horizontal"></div>
                    </div>

                    <div id="tr-nome">
                        <p>Turma C</p>
                        <div class="separador-horizontal"></div>
                    </div>

                    <div id="tr-nome">
                        <p>Turma D</p>
                        <div class="separador-horizontal"></div>
                    </div>
                </div>

                <div class="separador-vertical"></div>

                <div id="contato-professores">
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
            </div>
        </form>
    </div>

    <br><br><br><br><br>

</div>





<?php
include_once('./templetes/footer.php');
?>