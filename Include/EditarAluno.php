<?php

	include '../DAO/DAOAluno.class.php';
	
	$aluno = new Aluno();	

	$aluno->setIdaluno($_POST['id']);
	$aluno->setNome($_POST['nome']);
    $aluno->setSobrenome($_POST['sobrenome']);
	$aluno->setEmail($_POST['email']);
    $aluno->setSenha($_POST['senha']);
	$aluno->setMatricula($_POST['matricula']);
    $aluno->setCurso($_POST['curso']);
	$aluno->setSemestre($_POST['semestre']);
	

	$daoaluno = new DAOaluno();

$var = $aluno->getIdaluno();

	if($daoaluno->update($aluno)){
		header("Location:../index.php?id=$var");
	}else{
		echo $daoaluno->error;
	}

?>