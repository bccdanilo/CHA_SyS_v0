<?php
include '../DAO/DAOAluno.class.php';


$senha = $_POST['senha'];
$matricula = $_POST['matricula'];
$daoaluno = new DAOAluno;



$aluno = $daoaluno->LogaAluno($matricula,$senha);
$var = $aluno->getIdaluno();

if($var != 0){
  header("Location:../index.php?id=$var");
}else{
   header("Location:../logar.html"); 
}



  ?>