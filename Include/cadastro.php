<?php
include '../DAO/DAOAluno.class.php';


$aluno = NEW Aluno();




$aluno->setNome($_POST['nome']);
$aluno->setSobrenome($_POST['sobrenome']);
$aluno->setEmail($_POST['email']);
$aluno->setCurso($_POST['curso']);
$aluno->setSemestre($_POST['semestre']);
$aluno->setSenha($_POST['senha']);
$aluno->setMatricula($_POST['matricula']);


$daoaluno = new DAOAluno;

if($daoaluno->insert($aluno)){
	header("Location:../logar.html");
}else{
		echo $daoaluno->error;
	}

  ?>