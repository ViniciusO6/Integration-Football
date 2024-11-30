<?php
include_once('./templetes/menu.php');
include_once ('./config/globals.php');


$pessoa = $_GET['pessoa'];


if($pessoa == "aluno"){
    $_SESSION["id"] = 4;
    header("location: principal.php");
}elseif($pessoa == "professor"){
    $_SESSION["id"] = 5;
    header("location: calendarioProfessor.php");
}else{
    $_SESSION["id"] = 1;
    header("location: visualizarInscricoes.php");
}




?>